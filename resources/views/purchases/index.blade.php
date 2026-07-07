<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Purchases') }}</h2>
            <a href="{{ route('purchases.create') }}" class="px-4 py-2 bg-cheecha text-white rounded hover:bg-cheecha-dark">+ Add Purchase</a>
        </div>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ __('Purchases from Suppliers') }}</h3>

                @if(session('success'))
                    <div class="mb-4 px-4 py-2 bg-green-50 text-green-800 rounded">{{ session('success') }}</div>
                @endif

                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-cheecha-light">
                        <tr>
                            <th class="border px-4 py-2 text-left">Purchase Code</th>
                            <th class="border px-4 py-2 text-left">Date</th>
                            <th class="border px-4 py-2 text-left">Supplier Code</th>
                            <th class="border px-4 py-2 text-left">Item Name</th>
                            <th class="border px-4 py-2 text-center">Quantity</th>
                            <th class="border px-4 py-2 text-right">Total Price</th>
                            <th class="border px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($purchases as $p)
                        <tr>
                            <td class="border px-4 py-2">{{ $p->kode_pembelian }}</td>
                            <td class="border px-4 py-2">{{ $p->tanggal_pembelian->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $p->supplier->kode_supplier ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $p->nama_barang }}</td>
                            <td class="border px-4 py-2 text-center">{{ $p->jumlah_stok }}</td>
                            <td class="border px-4 py-2 text-right">Rp {{ number_format($p->harga_total, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('purchases.edit', $p) }}" class="px-2 py-1 bg-cheecha text-white rounded hover:bg-cheecha-dark">Edit</a>
                                <form action="{{ route('purchases.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this purchase?')">
                                    @csrf @method('DELETE')
                                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="border px-4 py-2 text-center">No purchase records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">{{ $purchases->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>