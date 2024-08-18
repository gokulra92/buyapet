<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'United States', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'China', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Japan', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Germany', 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'India', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('countries')->insert($countries);
    }
}
