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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 50)->nullable()->after('email');
            $table->string('address', 255)->nullable()->after('phone');

            $table->string('designation', 120)->nullable()->after('address');
            $table->string('level', 60)->nullable()->after('designation');

            $table->text('bio')->nullable()->after('level');

            // store social accounts as JSON: { "linkedin": "...", "github": "...", ... }
            $table->json('social_links')->nullable()->after('bio');

            // stored path like: profile-photos/abc.jpg (in storage/public)
            $table->string('profile_photo_path', 2048)->nullable()->after('social_links');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'address',
                'designation',
                'level',
                'bio',
                'social_links',
                'profile_photo_path',
            ]);
        });
    }
    
};
