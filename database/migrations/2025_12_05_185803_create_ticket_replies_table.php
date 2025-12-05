<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_message_id');
            $table->unsignedBigInteger('user_id')->nullable();   // admin/school/teacher id
            $table->string('user_type')->default('admin');       // 'admin', 'school', 'teacher', 'guest'
            $table->text('message');
            $table->boolean('is_internal_note')->default(false); // for future, if you want private notes
            $table->timestamps();

            $table->foreign('contact_message_id')
                  ->references('id')->on('contact_messages')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_replies');
    }
};
