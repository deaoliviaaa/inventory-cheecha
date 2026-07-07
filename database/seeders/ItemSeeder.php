<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['code' => '001', 'name' => 'Cream Cheese', 'type' => 'Bahan Baku', 'stock' => 1, 'price' => 95000],
            ['code' => '002', 'name' => 'Matcha Powder', 'type' => 'Bahan Baku', 'stock' => 1, 'price' => 60000],
            ['code' => '003', 'name' => 'Margarin', 'type' => 'Bahan Baku', 'stock' => 2, 'price' => 5800],
            ['code' => '004', 'name' => 'Gula', 'type' => 'Bahan Baku', 'stock' => 1, 'price' => 35000],
            ['code' => '005', 'name' => 'Tepung Terigu', 'type' => 'Bahan Baku', 'stock' => 1, 'price' => 9900],
            ['code' => '006', 'name' => 'Cup 125ml', 'type' => 'Packaging', 'stock' => 126, 'price' => 1300],
            ['code' => '007', 'name' => 'Gelatin Bubuk', 'type' => 'Bahan Baku', 'stock' => 1, 'price' => 14000],
            ['code' => '008', 'name' => 'Sendok Kayu', 'type' => 'Packaging', 'stock' => 100, 'price' => 200],
            ['code' => '009', 'name' => 'Susu Bubuk', 'type' => 'Bahan Baku', 'stock' => 3, 'price' => 4400],
            ['code' => '010', 'name' => 'Telur', 'type' => 'Bahan Baku', 'stock' => 6, 'price' => 2300],
            ['code' => '011', 'name' => 'Biskuit Regal', 'type' => 'Bahan Baku', 'stock' => 5, 'price' => 12000],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}