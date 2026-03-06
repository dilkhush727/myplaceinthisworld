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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();

            // e.g. "pages.home.hero_title" OR "course.12.title"
            $table->string('group')->index();

            // "fr" (we will store only translated locales)
            $table->string('locale', 10)->index();

            $table->longText('source_text');
            $table->longText('translated_text');

            // hash lets us cache based on the exact source text
            $table->string('source_hash', 64)->index();

            $table->timestamps();

            $table->unique(['group', 'locale', 'source_hash']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
