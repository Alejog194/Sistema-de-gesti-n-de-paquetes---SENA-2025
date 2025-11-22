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
        Schema::create('detalles_paquetes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paquete_id')->constrained('paquetes'); //clave foránea de la tabla paquetes.
            $table->foreignId('tipo_mercancia_id')->constrained('tipo_mercancia'); //clave foránea de la tabla tipo_mercancia.
            $table->string('dimension', 45); // VARCHAR(45) para la dimensión del paquete.
            $table->string('peso', 45); // VARCHAR(45) para el peso del paquete.
            $table->date('fecha_entrega'); // Fecha de entrega del paquete.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_paquetes');
    }
};
