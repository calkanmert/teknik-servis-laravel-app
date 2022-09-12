<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device_types')->insert([
            [
                'value' => 'Notebook',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'Bilgisayar Kasası',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'Telefon',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'value' => 'Akıllı Saat',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
