<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with('supplier', 'updater')
            ->orderBy('kode_pembelian', 'asc')
            ->paginate(10);

        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('purchases.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_pembelian' => 'required|string|max:50|unique:purchases',
            'tanggal_pembelian' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'nama_barang' => 'required|string|max:255',
            'jumlah_stok' => 'required|integer|min:1',
            'harga_total' => 'required|numeric|min:0',
        ]);

        $validated['updated_by'] = Auth::id();

        Purchase::create($validated);

        return redirect()
            ->route('purchases.index')
            ->with('success', 'Pembelian berhasil ditambahkan.');
    }

    public function edit(Purchase $purchase)
    {
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('purchases.edit', compact('purchase', 'suppliers'));
    }

    public function update(Request $request, Purchase $purchase)
    {
        $validated = $request->validate([
            'kode_pembelian' => 'required|string|max:50|unique:purchases,kode_pembelian,' . $purchase->id,
            'tanggal_pembelian' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'nama_barang' => 'required|string|max:255',
            'jumlah_stok' => 'required|integer|min:1',
            'harga_total' => 'required|numeric|min:0',
        ]);

        $validated['updated_by'] = Auth::id();

        $purchase->update($validated);

        return redirect()
            ->route('purchases.index')
            ->with('success', 'Pembelian berhasil diupdate.');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()
            ->route('purchases.index')
            ->with('success', 'Pembelian berhasil dihapus.');
    }
}