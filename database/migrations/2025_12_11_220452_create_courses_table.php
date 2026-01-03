<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            // division this course belongs to
            $table->enum('division', ['primary', 'ji', 'highschool']);

            $table->string('title');
            $table->string('slug')->unique();

            // short description for cards
            $table->text('summary')->nullable();

            // hero/card image path
            $table->string('image_path')->nullable();

            // is this course visible?
            $table->boolean('is_published')->default(true);

            // optional metadata
            $table->unsignedInteger('estimated_minutes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
