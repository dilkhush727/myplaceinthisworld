<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->cascadeOnDelete();

            // e.g. "Teacher Background Information", "Instructions"
            $table->string('title');
            $table->string('slug');

            // order inside the lesson section
            $table->unsignedInteger('sort_order')->default(0);

            // main HTML content for this task
            $table->longText('body')->nullable();

            $table->timestamps();

            $table->unique(['lesson_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
