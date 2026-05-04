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
                    <h3 class="text-lg font-semibold text-gray-800">Purchase List</h3>
                    <a href="{{ route('supplier-purchases.create') }}" class="rounded px-4 py-2 text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">
                        + Add Purchase
                    </a>
                </div>

                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-cheecha-light">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Code</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Item Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Store</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Date</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Qty</th>
                            <th class="border border-gray-300 px-4 py-2 text-gray-800">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($purchases as $p)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $p->code }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('items.index', ['search' => $p->item_name]) }}" class="text-cheecha underline">
                                    {{ $p->item_name }}
                                </a>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $p->store_name }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $p->purchase_date->format('d/m/Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center text-gray-800">{{ $p->quantity }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center space-x-1">
                                <a href="{{ route('supplier-purchases.edit', $p) }}" class="inline-block px-2 py-1 rounded text-white font-semibold bg-cheecha hover:bg-cheecha-dark transition">Edit</a>
                                <form action="{{ route('supplier-purchases.destroy', $p) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this purchase?')">
                                    @csrf @method('DELETE')
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border border-gray-300 px-4 py-2 text-center text-gray-800">No purchases found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $purchases->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>