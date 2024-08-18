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
        Schema::create('customer_ratings_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submitted_by');
            $table->unsignedBigInteger('submitted_to');
            $table->string('ratings');
            $table->longText('comments')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->tinyInteger('deleted_by')->nullable();

            $table->foreign('submitted_by')->references('id')->on('customers');
            $table->foreign('submitted_to')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_ratings_comment');
    }
};
