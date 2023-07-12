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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('address');
            $table->String('school');
            $table->foreignId('identity_id')->constrained('identities');
            $table->integer('number_identity');
            $table->integer('gender');
            $table->foreignId('nationality_id')->constrained('Nationality');
            $table->foreignId('guardian_id')->constrained('guardian');
            $table->string('link_kinship');
            $table->String('previous_save');
            $table->Date('date_Join');
            $table->foreignId('quran_episodes_id')->constrained('quran_episodes');
            $table->foreignId('users_id')->constrained('users');
            $table->string('image');
            $table->Date('birth_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
