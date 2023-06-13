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
        Schema::create('quran_episades', function (Blueprint $table) {
            $table->id();

            
            $table->foreignId('Id_teacher')->constrained('teachers');
            $table->string('name_episodes');

            $table->foreignId('Id_period')->constrained('periods');
            $table->integer('number_student');
            $table->foreignId('sex_id')->constrained('sexes');
            $table->foreignId('Id_system')->constrained('system_episodes');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran_episades');
    }
};
