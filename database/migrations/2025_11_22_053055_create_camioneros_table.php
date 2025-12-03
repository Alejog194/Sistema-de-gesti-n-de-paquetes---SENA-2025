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
    Schema::create('camioneros', function (Blueprint $table) {
        $table->id();
        $table->string('documento', 20)->unique();  // Aumentado a 20 y único
        $table->string('nombre', 255);              // Aumentado a 255
        $table->string('apellido', 255);            // Aumentado a 255
        $table->date('fecha_nacimiento');
        $table->string('licencia', 20);             // Aumentado a 20
        $table->string('telefono', 20);             // Aumentado a 20
        $table->string('email', 255)->nullable();   // AGREGADO
        $table->text('direccion')->nullable();      // AGREGADO
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camioneros');
    }
};
