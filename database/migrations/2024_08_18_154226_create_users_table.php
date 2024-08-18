<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->string('phone_number')->unique();
            $table->enum('role', [
                'level_1',
                'level_2',
                'level_3',
                'level_4'
            ])->default('level_1');
            $table->string('profile_picture')->nullable();
            $table->boolean('is_ph_verified')->default(false);
            $table->boolean('is_email_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('deleted_by')->nullable();
        });
        $this->seedUsers();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    /**
     * Seeding the Users
     *
     */
    private function seedUsers()
    {
        $seeder = new \Database\Seeders\UsersSeeder;
        $seeder->run();
    }
};
