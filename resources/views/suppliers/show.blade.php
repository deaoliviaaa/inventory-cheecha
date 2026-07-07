<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Supplier Details') }}</h2>
    </x-slot>

    <div class="py-6 bg-cheecha-bg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6 border border-gray-200">
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div><strong>Supplier Code:</strong> {{ $supplier->kode_supplier }}</div>
                    <div><strong>Supplier Name:</strong> {{ $supplier->nama_supplier }}</div>
                    <div><strong>Address:</strong> {{ $supplier->alamat_supplier ?? '-' }}</div>
                    <div><strong>Item:</strong> {{ $supplier->nama_barang }}</div>
                    <div><strong>Unit Price:</strong> Rp {{ number_format($supplier->harga_satuan, 0, ',', '.') }}</div>
                    <div><strong>Last Updated:</strong> {{ $supplier->updated_at->format('d-m-Y H:i') }}</div>
                </div>

                <hr class="my-4">

                <h3 class="text-lg font-semibold mb-4">📋 Purchase History from This Supplier</h3>
                @if($purchases->isEmpty())
                    <p class="text-gray-500">No purchases from this supplier yet.</p>
                @else
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-cheecha-light">
                            <tr>
                                <th class="border px-4 py-2">Purchase Code</th>
                                <th class="border px-4 py-2">Date</th>
                                <th class="border px-4 py-2">Item Name</th>
                                <th class="border px-4 py-2">Quantity</th>
                                <th class="border px-4 py-2">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $p)
                            <tr>
                                <td class="border px-4 py-2">{{ $p->kode_pembelian }}</td>
                                <td class="border px-4 py-2">{{ $p->tanggal_pembelian->format('d-m-Y') }}</td>
                                <td class="border px-4 py-2">{{ $p->nama_barang }}</td>
                                <td class="border px-4 py-2 text-center">{{ $p->jumlah_stok }}</td>
                                <td class="border px-4 py-2">Rp {{ number_format($p->harga_total, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="mt-6">
                    <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>