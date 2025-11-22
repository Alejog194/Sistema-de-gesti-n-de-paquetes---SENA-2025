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
        Schema::create('camioneros_camiones', function (Blueprint $table) {
            $table->id(); // ID de la tabla pivote.
            $table->foreignId('camionero_id')->constrained('camioneros');  //clave foránea de la tabla camioneros.
            $table->foreignId('camion_id')->constrained('camiones'); //clave foránea de la tabla camiones.
            $table->timestamps(); //para saber cuándo se asignó el camión al camionero. esto es opcional..
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camioneros_camiones');
    }
};
