<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode_supplier' => 'A001', 'nama_supplier' => 'Toko ABC', 'alamat_supplier' => 'Jl. XYZ, No.A1', 'nama_barang' => 'Gelatin', 'harga_satuan' => 1500],
            ['kode_supplier' => 'A002', 'nama_supplier' => 'Toko Hammams', 'alamat_supplier' => 'Jl. Buyga, No.B3', 'nama_barang' => 'Matcha Bubuk', 'harga_satuan' => 5000],
            ['kode_supplier' => 'A003', 'nama_supplier' => 'Toko Yuda', 'alamat_supplier' => 'Jl. Merdeka, No.7', 'nama_barang' => 'Cream Cheese', 'harga_satuan' => 20000],
            ['kode_supplier' => 'A004', 'nama_supplier' => 'Toko Citra', 'alamat_supplier' => 'Jl. Sudirman, No.12', 'nama_barang' => 'Regal', 'harga_satuan' => 10000],
            ['kode_supplier' => 'A005', 'nama_supplier' => 'Toko Simaras', 'alamat_supplier' => 'Jl. Ahmad Yani, No.5', 'nama_barang' => 'Gula', 'harga_satuan' => 5000],
        ];

        foreach ($data as $d) {
            Supplier::create($d);
        }
    }
}