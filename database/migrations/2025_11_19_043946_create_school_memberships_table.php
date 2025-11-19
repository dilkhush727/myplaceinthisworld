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
        Schema::create('school_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();

            // membership type: highschool, primary, ji
            $table->string('type'); // we'll enforce allowed values in code for now

            // billing: monthly, annual, or free
            $table->string('billing_period')->nullable(); // 'monthly', 'annual', or null for free HS

            // is this free (true for HS base membership)
            $table->boolean('is_free')->default(false);

            // status: active, expired, cancelled
            $table->string('status')->default('active');

            // dates
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable(); // null for lifetime HS

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_memberships');
    }
};
