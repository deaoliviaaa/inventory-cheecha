<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $item->name }}
        </h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-200">
                <div class="flex justify-end space-x-2 mb-6">
                    <a href="{{ route('items.edit', $item) }}" class="px-4 py-2 rounded text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">
                        Edit
                    </a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-semibold">
                            Delete
                        </button>
                    </form>
                </div>

                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-1 text-gray-800">
                        <table class="w-full">
                            <tr><td class="font-medium pr-2 py-1">Code</td><td>: {{ $item->code }}</td></tr>
                            <tr><td class="font-medium pr-2 py-1">Name</td><td>: {{ $item->name }}</td></tr>
                            <tr><td class="font-medium pr-2 py-1">Description</td><td>: {{ $item->description ?? '-' }}</td></tr>
                            <tr><td class="font-medium pr-2 py-1">Type</td><td>: {{ $item->type }}</td></tr>
                            <tr><td class="font-medium pr-2 py-1">Stock</td><td>: {{ $item->stock }}</td></tr>
                            <tr><td class="font-medium pr-2 py-1">Price</td><td>: Rp {{ number_format($item->price, 0, ',', '.') }}</td></tr>
                        </table>
                    </div>
                    <div class="w-full md:w-1/3">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover rounded border border-gray-300">
                        @else
                            <div class="w-full h-48 bg-gray-100 rounded flex items-center justify-center border border-gray-300">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('items.index') }}" class="px-4 py-2 rounded text-white font-semibold bg-gray-600 hover:bg-gray-700 transition">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>