<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeviceBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device_brands')->insert([
            [
                'value' => 'Apple',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'Samsung',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'Huawei',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'Acer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'HP',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
