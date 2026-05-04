<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '001',
                'name' => 'Cream Cheese',
                'description' => 'Merk calf',
                'image' => 'images/cream-cheese.jpg',
                'type' => 'Bahan Baku',
                'stock' => 1,
                'price' => '95000.00',
                'created_at' => '2026-05-04 10:32:29',
                'updated_at' => '2026-05-04 13:20:13',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '002',
                'name' => 'Matcha Powder',
                'description' => NULL,
                'image' => NULL,
                'type' => 'Bahan Baku',
                'stock' => 1,
                'price' => '60000.00',
                'created_at' => '2026-05-04 13:25:06',
                'updated_at' => '2026-05-04 13:25:17',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '003',
                'name' => 'Margarin',
                'description' => 'Brand Madina',
                'image' => NULL,
                'type' => 'Bahan Baku',
                'stock' => 2,
                'price' => '5800.00',
                'created_at' => '2026-05-04 13:26:28',
                'updated_at' => '2026-05-04 13:26:28',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '004',
                'name' => 'Gula',
                'description' => NULL,
                'image' => NULL,
                'type' => 'Bahan Baku',
                'stock' => 1,
                'price' => '35000.00',
                'created_at' => '2026-05-04 13:27:48',
                'updated_at' => '2026-05-04 13:27:48',
            ),
        ));
        
        
    }
}