<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['name' => 'Ariyalur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chengalpattu', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chennai', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Coimbatore', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cuddalore', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dharmapuri', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dindigul', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Erode', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kallakurichi', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kanchipuram', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kanyakumari', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Krishnagiri', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madurai', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mayiladuthurai', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nagapattinam', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Namakkal', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nilgiris', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Perambalur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pudukkottai', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ramanathapuram', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ranipet', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salem', 'country_id' => 5, 'state_id' => 23, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sivaganga', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tenkasi', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thanjavur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Theni', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thiruvallur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thiruvarur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tiruchirappalli', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tirunelveli', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tirupattur', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tiruvannamalai', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tuticorin', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vellore', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Viluppuram', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Virudhunagar', 'country_id' => 5, 'state_id' => 23, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alappuzha', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ernakulam', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Idukki', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kannur', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kasaragod', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kollam', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kottayam', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kozhikode', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Malappuram', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Palakkad', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pathanamthitta', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thiruvananthapuram', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thrissur', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wayanad', 'country_id' => 5, 'state_id' => 12, 'is_active' => false, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('districts')->insert($districts);
    }
}
