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
            $table->string('name');
            $table->string('qualification');
            $table->string('work');
            $table->integer('salary');
            // $table->foreignId('phone_id')->constrained('phone');
            $table->date('teaching_years');
            $table->string('center_they_work');
            $table->string('address');
            $table->foreignId('identity_id')->constrained('identities');
            $table->integer('number_identity');
            $table->integer('gender');
            $table->foreignId('nationality_id')->constrained('Nationality');
            $table->Date('birth_date');
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
