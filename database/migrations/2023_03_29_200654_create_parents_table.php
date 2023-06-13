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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('Name_parents');
            $table->integer('Phone');
            $table->foreignId('identtity_id')->constrained('identities');
            $table->integer('Number_identity');
            $table->foreignId('sex_id')->constrained('sexes');
            $table->foreignId('sexual_id')->constrained('sexuals');
           
            $table->string('Job');
            $table->string('link_kinship');
            $table->string('Social_status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
