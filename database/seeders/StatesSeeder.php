<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Andhra Pradesh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arunachal Pradesh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assam', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bihar', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chhattisgarh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Goa', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gujarat', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Haryana', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Himachal Pradesh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jharkhand', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karnataka', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kerala', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madhya Pradesh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maharashtra', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Manipur', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meghalaya', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mizoram', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nagaland', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Odisha', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Punjab', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rajasthan', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sikkim', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tamil Nadu', 'country_id' => 5, 'is_active'=> true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Telangana', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tripura', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Uttar Pradesh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Uttarakhand', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'West Bengal', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Andaman and Nicobar Islands', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chandigarh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dadra and Nagar Haveli and Daman and Diu', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lakshadweep', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delhi', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Puducherry', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ladakh', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jammu and Kashmir', 'country_id' => 5, 'is_active'=> false, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('states')->insert($states);
    }
}
