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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('title');
            $table->string('initial_price');
            $table->string('new_price');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('breed_id');
            $table->date('pet_dob')->nullable();
            $table->enum('gender', [
                'male',
                'female'
            ]);
            $table->string('height');
            $table->string('weight');
            $table->json('colors')->nullable();
            $table->string('allergies')->nullable();
            $table->string('lat_long');
            $table->longText('description');
            $table->string('country');
            $table->string('state');
            $table->string('district');
            $table->string('city')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->enum('deleted_by', [
                'customer',
                'admin'
            ])->nullable();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('pet_categories')->onDelete('cascade');
            $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
