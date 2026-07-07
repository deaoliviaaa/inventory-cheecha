<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Supplier Catalog') }}
            </h2>
            <a href="{{ route('suppliers.create') }}" class="px-4 py-2 bg-cheecha text-white rounded hover:bg-cheecha-dark">
                + Add Supplier
            </a>
        </div>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-50 text-green-800 rounded">{{ session('success') }}</div>
                @endif

                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-cheecha-light">
                        <tr>
                            <th class="border px-4 py-2 text-left">Supplier Code</th>
                            <th class="border px-4 py-2 text-left">Supplier Name</th>
                            <th class="border px-4 py-2 text-left">Address</th>
                            <th class="border px-4 py-2 text-left">Item</th>
                            <th class="border px-4 py-2 text-right">Unit Price</th>
                            <th class="border px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $s)
                        <tr>
                            <td class="border px-4 py-2">{{ $s->kode_supplier }}</td>
                            <td class="border px-4 py-2">{{ $s->nama_supplier }}</td>
                            <td class="border px-4 py-2">{{ $s->alamat_supplier ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $s->nama_barang }}</td>
                            <td class="border px-4 py-2 text-right">Rp {{ number_format($s->harga_satuan, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('suppliers.show', $s) }}" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Details</a>
                                <a href="{{ route('suppliers.edit', $s) }}" class="px-2 py-1 bg-cheecha text-white rounded hover:bg-cheecha-dark">Edit</a>
                                <form action="{{ route('suppliers.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this supplier?')">
                                    @csrf @method('DELETE')
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border px-4 py-2 text-center">No supplier data found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $suppliers->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>