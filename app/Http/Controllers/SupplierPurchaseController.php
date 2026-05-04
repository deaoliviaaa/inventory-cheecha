<?php

namespace App\Http\Controllers;

use App\Models\SupplierPurchase;
use Illuminate\Http\Request;

class SupplierPurchaseController extends Controller
{
    public function index()
    {
        $purchases = SupplierPurchase::orderBy('purchase_date', 'desc')->paginate(10);
        return view('supplier_purchases.index', compact('purchases'));
    }

    public function create()
    {
        return view('supplier_purchases.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:supplier_purchases',
            'item_name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        SupplierPurchase::create($validated);
        return redirect()->route('supplier-purchases.index')->with('success', 'Purchase saved.');
    }

    public function edit(SupplierPurchase $supplierPurchase)
    {
        return view('supplier_purchases.edit', compact('supplierPurchase'));
    }

    public function update(Request $request, SupplierPurchase $supplierPurchase)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:supplier_purchases,code,'.$supplierPurchase->id,
            'item_name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $supplierPurchase->update($validated);
        return redirect()->route('supplier-purchases.index')->with('success', 'Purchase updated.');
    }

    public function destroy(SupplierPurchase $supplierPurchase)
    {
        $supplierPurchase->delete();
        return redirect()->route('supplier-purchases.index')->with('success', 'Purchase deleted.');
    }
}