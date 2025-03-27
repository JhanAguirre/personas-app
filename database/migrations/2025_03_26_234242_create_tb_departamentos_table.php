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
        Schema::create('tb_departamento', function (Blueprint $table) {
         $table->id('dep_codi'); 
         $table->string('dep_nomb');
         $table->unsignedBigInteger('pais_codi')->nullable();
         $table->foreign('pais_codi')->references('pais_codi')->on('tb_pais');
         $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_departamento');
    }
};
