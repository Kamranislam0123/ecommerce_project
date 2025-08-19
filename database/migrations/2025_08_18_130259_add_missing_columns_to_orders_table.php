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
        Schema::table('orders', function (Blueprint $table) {
            $table->text('pending_msg')->nullable()->after('status');
            $table->text('process_msg')->nullable()->after('pending_msg');
            $table->text('way_msg')->nullable()->after('process_msg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['pending_msg', 'process_msg', 'way_msg']);
        });
    }
};
