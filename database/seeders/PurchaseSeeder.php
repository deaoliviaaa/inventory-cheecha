<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode_pembelian' => '001',
                'tanggal_pembelian' => '2024-07-02',
                'supplier_id' => 2,
                'nama_barang' => 'Matcha Bubuk',
                'jumlah_stok' => 2,
                'harga_total' => 10000,
            ],
            [
                'kode_pembelian' => '002',
                'tanggal_pembelian' => '2024-07-03',
                'supplier_id' => 5,
                'nama_barang' => 'Gula',
                'jumlah_stok' => 1,
                'harga_total' => 5000,
            ],
        ];

        foreach ($data as $item) {
            Purchase::updateOrCreate(
                ['kode_pembelian' => $item['kode_pembelian']],
                $item
            );
        }
    }
}