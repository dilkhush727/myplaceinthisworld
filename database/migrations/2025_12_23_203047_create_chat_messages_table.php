<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();

            $table->uuid('chat_session_id');
            $table->string('role', 20); // user | assistant
            $table->longText('content');
            $table->json('sources')->nullable(); // which docs were used (for debugging/audit)

            $table->timestamps();

            $table->foreign('chat_session_id')
                ->references('id')
                ->on('chat_sessions')
                ->cascadeOnDelete();

            $table->index(['chat_session_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
