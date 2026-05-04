<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cheecha Inventory
        </h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                @if (session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-50 text-green-800 rounded border border-green-300">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Item List</h3>
                    <a href="{{ route('items.create') }}" class="rounded px-4 py-2 text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">
                        + Add Item
                    </a>
                </div>

                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-cheecha-light">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Code</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Type</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Stock</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Price (Rp)</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $item->code }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $item->name }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $item->type }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $item->stock }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('items.show', $item) }}" class="inline-block px-3 py-1 rounded text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">
                                    Details
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border border-gray-300 px-4 py-2 text-center text-gray-800">No items found.</td>
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