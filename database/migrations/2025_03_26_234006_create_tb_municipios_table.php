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
        Schema::create('tb_municipio', function (Blueprint $table) {
            $table->id('muni_codi'); 
            $table->string('muni_nomb'); 
           
            $table->unsignedBigInteger('dep_codi')->nullable();
            $table->foreign('dep_codi')->references('dep_codi')->on('tb_departamento');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_municipio');
    }
};
