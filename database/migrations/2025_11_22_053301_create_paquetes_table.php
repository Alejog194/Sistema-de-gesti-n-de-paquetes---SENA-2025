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
            
            // Relaciones
            $table->foreignId('camionero_id')->constrained('camioneros')->onDelete('restrict');
            $table->foreignId('estado_id')->constrained('estados_paquetes')->onDelete('restrict');
            $table->foreignId('tipo_mercancia_id')->nullable()->constrained('tipo_mercancia')->onDelete('set null');
            $table->foreignId('camion_id')->nullable()->constrained('camiones')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            
            // Dirección (tu campo original)
            $table->string('direccion', 255);
            
            // Campos adicionales básicos
            $table->string('codigo', 50)->unique()->nullable();
            $table->text('descripcion')->nullable();
            $table->decimal('peso', 10, 2)->nullable();
            $table->string('dimensiones', 100)->nullable();
            
            // Fechas
            $table->date('fecha_envio')->nullable();
            $table->date('fecha_estimada')->nullable();
            $table->date('fecha_entrega_real')->nullable();
            
            // Costo
            $table->decimal('costo', 10, 2)->nullable()->default(0);
            
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
