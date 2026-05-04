<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cheecha.Inventory
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Item List</h3>
                    <a href="{{ route('items.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        + Add Item
                    </a>
                </div>

                <table class="w-full border-collapse border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Code</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Type</th>
                            <th class="border px-4 py-2">Stock</th>
                            <th class="border px-4 py-2">Price (Rp)</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $item->code }}</td>
                            <td class="border px-4 py-2">{{ $item->name }}</td>
                            <td class="border px-4 py-2">{{ $item->type }}</td>
                            <td class="border px-4 py-2">{{ $item->stock }}</td>
                            <td class="border px-4 py-2">{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('items.show', $item) }}" class="px-2 py-1 bg-blue-500 text-white rounded">Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border px-4 py-2 text-center">No items found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>