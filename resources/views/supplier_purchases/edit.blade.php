<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Purchase
        </h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-sm sm:rounded-lg p-6 bg-white border border-gray-200">
                <form action="{{ route('supplier-purchases.update', $supplierPurchase) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Code</label>
                        <input type="text" name="code" value="{{ old('code', $supplierPurchase->code) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('code') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Item Name</label>
                        <input type="text" name="item_name" value="{{ old('item_name', $supplierPurchase->item_name) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('item_name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Store</label>
                        <input type="text" name="store_name" value="{{ old('store_name', $supplierPurchase->store_name) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('store_name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Purchase Date</label>
                        <input type="date" name="purchase_date" value="{{ old('purchase_date', $supplierPurchase->purchase_date->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('purchase_date') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity', $supplierPurchase->quantity) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('quantity') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Description</label>
                        <textarea name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">{{ old('description', $supplierPurchase->description) }}</textarea>
                        @error('description') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 rounded text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">Update</button>
                        <a href="{{ route('supplier-purchases.index') }}" class="px-4 py-2 rounded text-white font-semibold bg-gray-600 hover:bg-gray-700 transition">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>