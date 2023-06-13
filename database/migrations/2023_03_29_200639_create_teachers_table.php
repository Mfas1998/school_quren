<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException ;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('Name_tracher');
            $table->Date('Date_birth');
            $table->string('Qualification');
            $table->string('Work');
            $table->integer('Salary');
            $table->integer('phone');
            $table->string('Email')->unique();
            $table->date('Teaching_years');
            $table->string('Center_they_work');
            $table->string('Address');
            $table->foreignId('identtity_id')->constrained('identities');
            $table->integer('Number_identity');
            $table->foreignId('sex_id')->constrained('sexes');
            $table->foreignId('sexual_id')->constrained('sexuals');
            
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
