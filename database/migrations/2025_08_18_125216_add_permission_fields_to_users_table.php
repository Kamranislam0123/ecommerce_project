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
            $table->boolean('action_process')->default(0)->after('status');
            $table->boolean('action_view')->default(0)->after('action_process');
            $table->boolean('action_edit')->default(0)->after('action_view');
            $table->boolean('action_create')->default(0)->after('action_edit');
            $table->boolean('action_delete')->default(0)->after('action_create');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['action_process', 'action_view', 'action_edit', 'action_create', 'action_delete']);
        });
    }
};
