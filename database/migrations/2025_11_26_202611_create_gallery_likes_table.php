<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_likes', function (Blueprint $table) {

            $table->id();

            // The gallery being liked
            $table->foreignId('gallery_id')
                ->constrained('galleries')
                ->onDelete('cascade');

            // Logged-in user (optional)
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            // Guest visitor IP (optional)
            $table->string('ip_address', 45)->nullable();

            $table->timestamps();

            // Unique constraints
            // A LOGGED-IN USER can like only once
            $table->unique(['gallery_id', 'user_id'], 'like_unique_user');

            // A GUEST IP can like only once
            $table->unique(['gallery_id', 'ip_address'], 'like_unique_ip');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_likes');
    }
};
