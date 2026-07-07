<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::insert([
            [
                'name' => 'Basic',
                'price' => 50000,
                'duration_days' => 30,
                'description' => 'Akses kelas dasar selama 30 hari',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pro',
                'price' => 100000,
                'duration_days' => 30,
                'description' => 'Akses kelas premium selama 30 hari',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Business',
                'price' => 250000,
                'duration_days' => 90,
                'description' => 'Akses kelas bisnis selama 90 hari',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}