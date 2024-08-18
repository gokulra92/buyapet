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
        Schema::create('referred_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('reference_key');
            $table->unsignedBigInteger('referred_by');
            $table->string('referred_to');
            $table->boolean('complete_status');
            $table->timestamps();

            $table->foreign('referred_by')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referred_profiles');
    }
};
