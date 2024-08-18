<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$12$9QSLTUDRzxPa1aTNrNe5/uK7SLVCc3JnkC15v2EYiqpeBamg5.DBS', 'phone_number' => '9788345749', 'role' => 'level_1', 'is_email_verified' => true, 'is_active' => true, 'created_at' => now()]
        ];
        DB::table('users')->insert($users);
    }
}
