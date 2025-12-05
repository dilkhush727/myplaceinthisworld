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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->nullable();    // e.g. "Events", "Achievements"
            $table->longText('content')->nullable();   // description / story
            $table->json('tags')->nullable();          // ["growth", "students", "2025"]

            // Approval status: pending, approved, rejected
            $table->string('status')->default('pending');

            // Who created this gallery item
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Optional: link to school (for school / teacher posts)
            $table->foreignId('school_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
