<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('kode_supplier')->paginate(10);
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_supplier' => 'required|string|max:50|unique:suppliers',
            'nama_supplier' => 'required|string|max:255',
            'alamat_supplier' => 'nullable|string',
            'nama_barang' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $validated['updated_by'] = Auth::id();
        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function show(Supplier $supplier)
    {
        $purchases = $supplier->purchases()->orderBy('tanggal_pembelian', 'desc')->get();
        return view('suppliers.show', compact('supplier', 'purchases'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'kode_supplier' => 'required|string|max:50|unique:suppliers,kode_supplier,' . $supplier->id,
            'nama_supplier' => 'required|string|max:255',
            'alamat_supplier' => 'nullable|string',
            'nama_barang' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $validated['updated_by'] = Auth::id();
        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diupdate.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus.');
    }
}