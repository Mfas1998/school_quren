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
        Schema::table('guardian', function (Blueprint $table) {
            $table->foreignId('users_id')->constrained('users');
            // $table->foreignId('type_users_id')->constrained('type_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Parents', function (Blueprint $table) {
            //
        });
    }
};
