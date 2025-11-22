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
        Schema::create('camiones', function (Blueprint $table) {
            $table->id();
            $table->foreegnId('camionero_id')->constrained('camioneros'); //clave foránea de la tabla camioneros.
            $table->string('placa',10);
            $table->string('modelo',45);
           //$table->string('marca',45);
           // $table->integer('capacidad_kg');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camiones');
    }
};
