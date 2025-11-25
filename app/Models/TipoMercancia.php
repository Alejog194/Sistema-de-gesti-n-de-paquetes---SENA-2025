<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMercancia extends Model
{
    use HasFactory;

    /** 
     * Los atributos que pueden ser llenados masivamente.
    */
    protected $fillable = [
        'tipo'
    ];

    /**
     * UN Tipo de Mercancía TIENE MUCHOS Detalles de Paquetes
     * Relación uno a muchos
     */
    public function detallesPaquetes()
    {
        return $this->hasMany(DetallePaquete::class, 'tipo_mercancia_id');
    }

    /**
     * Obtener el tipo formateado
     */
    public function getTipoFormateadoAttribute()
    {
        return ucfirst($this->tipo);
    }

    /**
     * Verificar si es mercancía frágil
     */
    public function getEsFragilAttribute()
    {
        return $this->tipo === 'frágil';
    }

    /**
     * Verificar si es mercancía perecedera
     */
    public function getEsPerecederoAttribute()
    {
        return $this->tipo === 'perecedero';
    }

    /**
     * Scope para tipos especiales que requieren cuidado
     */
    public function scopeRequiereCuidadoEspecial($query)
    {
        return $query->whereIn('tipo', ['frágil', 'perecedero', 'electrónico']);
    }
}