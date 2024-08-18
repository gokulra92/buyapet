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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('deleted_by')->nullable();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
        $this->seedStates();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_states');
    }

    /**
     * Seeding the States
     *
     */
    private function seedStates()
    {
        $seeder = new \Database\Seeders\StatesSeeder;
        $seeder->run();
    }
};
