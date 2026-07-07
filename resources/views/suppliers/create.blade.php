<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Add Supplier') }}</h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Supplier Code</label>
                        <input type="text" name="kode_supplier" value="{{ old('kode_supplier') }}" class="w-full border rounded px-3 py-2">
                        @error('kode_supplier') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Supplier Name</label>
                        <input type="text" name="nama_supplier" value="{{ old('nama_supplier') }}" class="w-full border rounded px-3 py-2">
                        @error('nama_supplier') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Address</label>
                        <textarea name="alamat_supplier" class="w-full border rounded px-3 py-2">{{ old('alamat_supplier') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Item Name</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="w-full border rounded px-3 py-2">
                        @error('nama_barang') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Unit Price (Rp)</label>
                        <input type="number" name="harga_satuan" value="{{ old('harga_satuan') }}" class="w-full border rounded px-3 py-2" step="0.01">
                        @error('harga_satuan') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-cheecha text-white rounded hover:bg-cheecha-dark">Save</button>
                        <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>