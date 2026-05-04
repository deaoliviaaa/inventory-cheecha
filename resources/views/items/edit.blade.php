<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Barang
        </h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-sm sm:rounded-lg p-6 bg-white border border-gray-200">
                <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Code</label>
                        <input type="text" name="code" value="{{ old('code', $item->code) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('code') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Name</label>
                        <input type="text" name="name" value="{{ old('name', $item->name) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('name') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Description</label>
                        <textarea name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">{{ old('description', $item->description) }}</textarea>
                        @error('description') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Image</label>
                        @if($item->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Current Image" class="h-24 rounded border border-gray-300">
                            </div>
                        @endif
                        <input type="file" name="image" class="bg-white w-full border border-gray-300 rounded px-3 py-2">
                        <p class="text-sm mt-1 text-gray-600">Leave empty to keep the current image.</p>
                        @error('image') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Type</label>
                        <select name="type" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                            <option value="Bahan Baku" {{ old('type', $item->type) == 'Bahan Baku' ? 'selected' : '' }}>Bahan Baku</option>
                            <option value="Packaging" {{ old('type', $item->type) == 'Packaging' ? 'selected' : '' }}>Packaging</option>
                            <option value="Produk Jadi" {{ old('type', $item->type) == 'Produk Jadi' ? 'selected' : '' }}>Produk Jadi</option>
                        </select>
                        @error('type') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Stock</label>
                        <input type="number" name="stock" value="{{ old('stock', $item->stock) }}" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('stock') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-800">Price</label>
                        <input type="number" name="price" value="{{ old('price', $item->price) }}" step="0.01" class="w-full border border-gray-300 rounded px-3 py-2 text-gray-800">
                        @error('price') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 rounded text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">Update</button>
                        <a href="{{ route('items.index') }}" class="px-4 py-2 rounded text-white font-semibold bg-gray-600 hover:bg-gray-700 transition">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>