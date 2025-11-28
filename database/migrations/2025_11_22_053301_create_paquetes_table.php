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
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camionero_id')->constrained('camioneros');
            $table->foreignId('estado_id')->constrained('estados_paquetes');
            // $table->foreignId('tipo_mercancia_id')->constrained('tipo_mercancia');
            $table->string('direccion', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
