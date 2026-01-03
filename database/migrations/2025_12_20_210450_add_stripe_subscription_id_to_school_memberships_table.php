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
        Schema::table('school_memberships', function (Blueprint $table) {
            $table->string('stripe_subscription_id')->nullable()->after('billing_period');
            // optional: store stripe price too
            // $table->string('stripe_price_id')->nullable()->after('stripe_subscription_id');
        });
    }

    public function down(): void
    {
        Schema::table('school_memberships', function (Blueprint $table) {
            $table->dropColumn('stripe_subscription_id');
            // $table->dropColumn('stripe_price_id');
        });
    }
    
};
