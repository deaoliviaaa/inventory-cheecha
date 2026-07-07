<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('code', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('type') && $request->type != 'all') {
            $query->where('type', $request->type);
        }

        $items = $query->orderBy('code')->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:items,code',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        }

        $item = Item::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'stock' => $validated['stock'],
            'price' => $validated['price'],
            'image' => $imagePath,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'create',
            'quantity' => $item->stock,
            'note' => 'Menambahkan item: ' . $item->name,
        ]);

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:items,code,' . $item->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image && file_exists(public_path($item->image))) {
                unlink(public_path($item->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['image'] = 'images/' . $filename;
        }

        $item->update([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'stock' => $validated['stock'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? $item->image,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'update',
            'note' => 'Mengubah item: ' . $item->name,
        ]);

        return redirect()->route('items.index')->with('success', 'Item berhasil diupdate.');
    }

    public function destroy(Item $item)
    {
        if ($item->image && file_exists(public_path($item->image))) {
            unlink(public_path($item->image));
        }

        ActivityLog::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => 'delete',
            'note' => 'Menghapus item: ' . $item->name,
        ]);

        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }

    public function adjustStock(Request $request, Item $item)
    {
        $request->validate([
            'delta' => 'required|integer|not_in:0',
        ]);

        $newStock = $item->stock + $request->delta;
        if ($newStock < 0) {
            return back()->withErrors(['error' => 'Stok tidak boleh negatif!']);
        }

        $item->update([
            'stock' => $newStock
        ]);

        $action = $request->delta > 0 ? 'add_stock' : 'reduce_stock';
        ActivityLog::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'action' => $action,
            'quantity' => abs($request->delta),
            'note' => ($request->delta > 0 ? 'Menambah' : 'Mengurangi') . ' stok ' . $item->name . ' menjadi ' . $newStock,
        ]);

        return redirect()->route('items.index')->with('success', 'Stok berhasil diperbarui.');
    }
}