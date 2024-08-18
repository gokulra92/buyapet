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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('deleted_by')->nullable();
        });
        $this->seedCountries();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_countries');
    }

    /**
     * Seeding the Countries
     *
     */
    private function seedCountries()
    {
        $seeder = new \Database\Seeders\CountriesSeeder;
        $seeder->run();
    }
};
