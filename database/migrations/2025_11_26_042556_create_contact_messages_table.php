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
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('category'); // e.g. General Inquiry, Technical Support, etc.
            $table->text('message');

            // Ticket-related fields
            $table->boolean('is_ticket')->default(false);
            $table->string('ticket_number')->nullable()->unique();
            $table->string('ticket_status')->nullable(); // e.g. open, closed, pending

            // Optional: track who submitted
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
