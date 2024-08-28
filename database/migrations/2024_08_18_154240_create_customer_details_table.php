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
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('reference_key')->nullable();
            $table->enum('gender', [
                'male',
                'female',
                'not_specified'
            ])->default('not_specified');
            $table->date('dob')->nullable();
            $table->boolean('subscribe_newsletter')->default(true);
            $table->boolean('show_followers_count')->default(false);
            $table->boolean('send_contact_detail_to_email')->default(false);
            $table->string('default_search_range')->nullable();
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('district');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('country')->references('id')->on('countries');
            $table->foreign('state')->references('id')->on('states');
            $table->foreign('district')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_details');
    }
};
