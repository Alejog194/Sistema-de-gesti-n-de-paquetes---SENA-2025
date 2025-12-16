<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMercancia extends Model
{
    use HasFactory;

    protected $table = 'tipo_mercancia';
    
    protected $fillable = ['tipo'];

    // ✅ CORRECTO: Relación con Paquetes
    public function paquetes()
    {
        return $this->hasMany(Paquete::class, 'tipo_mercancia_id');
    }
}
