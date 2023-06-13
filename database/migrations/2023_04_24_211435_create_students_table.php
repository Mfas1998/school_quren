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
            $table->String('Name_student');
            $table->Date('Date_birth');
            $table->String('Address');
            $table->String('Chapret');
            $table->String('School');
            $table->foreignId('identtity_id')->constrained('identities');
            $table->integer('Number_identity');
            $table->foreignId('sex_id')->constrained('sexes');
            $table->foreignId('sexual_id')->constrained('sexuals');
            $table->foreignId('parents_id')->constrained('parents');
            $table->String('Previous_save');
            $table->String('Current_save');
            $table->Date('Date_Join_Episode');
            $table->foreignId('quran_episodes_id')->constrained('quran_episades');
   

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
