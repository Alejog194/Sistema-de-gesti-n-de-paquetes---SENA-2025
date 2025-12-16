<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('paquetes', function (Blueprint $table) {
            // Agregar la columna user_id después del id
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('paquetes', function (Blueprint $table) {
            // Eliminar la relación y la columna
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
