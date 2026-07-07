<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Add Purchase') }}</h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <form action="{{ route('purchases.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Purchase Code</label>
                        <input type="text" name="kode_pembelian" value="{{ old('kode_pembelian') }}" class="w-full border rounded px-3 py-2">
                        @error('kode_pembelian') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Purchase Date</label>
                        <input type="date" name="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}" class="w-full border rounded px-3 py-2">
                        @error('tanggal_pembelian') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Supplier</label>
                        <select name="supplier_id" class="w-full border rounded px-3 py-2">
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $s)
                                <option value="{{ $s->id }}" {{ old('supplier_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->kode_supplier }} - {{ $s->nama_supplier }}
                                </option>
                            @endforeach
                        </select>
                        @error('supplier_id') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Item Name</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="w-full border rounded px-3 py-2">
                        @error('nama_barang') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Quantity</label>
                        <input type="number" name="jumlah_stok" value="{{ old('jumlah_stok', 1) }}" class="w-full border rounded px-3 py-2" min="1">
                        @error('jumlah_stok') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Total Price (Rp)</label>
                        <input type="number" name="harga_total" value="{{ old('harga_total') }}" class="w-full border rounded px-3 py-2" step="0.01">
                        @error('harga_total') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-cheecha text-white rounded hover:bg-cheecha-dark">Save</button>
                        <a href="{{ route('purchases.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>