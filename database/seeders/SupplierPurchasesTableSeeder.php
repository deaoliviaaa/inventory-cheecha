<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SupplierPurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('supplier_purchases')->delete();
        
        \DB::table('supplier_purchases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '001',
                'item_name' => 'Cream Cheese',
                'store_name' => 'CMC, JL. SUNGAI JAWI PONTIANAK',
                'purchase_date' => '2026-03-13',
                'quantity' => 3,
                'description' => NULL,
                'created_at' => '2026-05-04 16:52:09',
                'updated_at' => '2026-05-04 20:12:15',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '002',
                'item_name' => 'Matcha Powder',
                'store_name' => 'Kedai Bubuk, Jl. Danau Sentarum',
                'purchase_date' => '2026-04-21',
                'quantity' => 1,
                'description' => NULL,
                'created_at' => '2026-05-04 17:18:40',
                'updated_at' => '2026-05-04 17:18:40',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '004',
                'item_name' => 'Gula',
                'store_name' => 'Harum Manis, Jl. H. Agus Salim No. 18A',
                'purchase_date' => '2026-04-23',
                'quantity' => 1,
                'description' => NULL,
                'created_at' => '2026-05-04 22:49:05',
                'updated_at' => '2026-05-04 22:49:05',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '003',
                'item_name' => 'Margarin',
                'store_name' => 'Harum Manis, Jl. H. Agus Salim No. 18A',
                'purchase_date' => '2026-04-23',
                'quantity' => 4,
                'description' => NULL,
                'created_at' => '2026-05-04 22:49:45',
                'updated_at' => '2026-05-04 22:49:45',
            ),
        ));
        
        
    }
}