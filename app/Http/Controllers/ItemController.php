<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('code')->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:items',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['image'] = 'images/' . $filename;
        }

        Item::create($validated);
        return redirect()->route('items.index')->with('success', 'Item created.');
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
            'code' => 'required|string|max:50|unique:items,code,'.$item->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($item->image && file_exists(public_path($item->image))) {
                unlink(public_path($item->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['image'] = 'images/' . $filename;
        }

        $item->update($validated);
        return redirect()->route('items.index')->with('success', 'Item updated.');
    }

    public function destroy(Item $item)
    {
        // Hapus file gambar jika ada
        if ($item->image && file_exists(public_path($item->image))) {
            unlink(public_path($item->image));
        }
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted.');
    }
}