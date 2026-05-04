<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Barang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Kode -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kode</label>
                        <input type="text" name="code" value="{{ old('code', $item->code) }}"
                               class="w-full border rounded px-3 py-2">
                        @error('code') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $item->name) }}"
                               class="w-full border rounded px-3 py-2">
                        @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Deskripsi</label>
                        <textarea name="description" rows="3"
                                  class="w-full border rounded px-3 py-2">{{ old('description', $item->description) }}</textarea>
                        @error('description') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Gambar</label>
                        @if($item->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Current Image" class="h-24 rounded">
                            </div>
                        @endif
                        <input type="file" name="image"
                               class="w-full border rounded px-3 py-2">
                        <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
                        @error('image') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Jenis -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Jenis</label>
                        <select name="type" class="w-full border rounded px-3 py-2">
                            <option value="Bahan Baku" {{ old('type', $item->type) == 'Bahan Baku' ? 'selected' : '' }}>Bahan Baku</option>
                            <option value="Packaging" {{ old('type', $item->type) == 'Packaging' ? 'selected' : '' }}>Packaging</option>
                            <option value="Produk Jadi" {{ old('type', $item->type) == 'Produk Jadi' ? 'selected' : '' }}>Produk Jadi</option>
                        </select>
                        @error('type') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Stok -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Stok</label>
                        <input type="number" name="stock" value="{{ old('stock', $item->stock) }}"
                               class="w-full border rounded px-3 py-2">
                        @error('stock') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Harga</label>
                        <input type="number" name="price" value="{{ old('price', $item->price) }}" step="0.01"
                               class="w-full border rounded px-3 py-2">
                        @error('price') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Update
                        </button>
                        <a href="{{ route('items.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>