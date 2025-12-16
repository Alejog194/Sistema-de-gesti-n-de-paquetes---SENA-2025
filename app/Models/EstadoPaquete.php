<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPaquete extends Model
{
    use HasFactory;

    /** 
    * los atributos que pueden ser llenado masivamente
    */
    protected $table = 'estados_paquetes';
    protected $fillable = ['estado'];

    public function paquetes()
    {
        return $this->hasMany(Paquete::class, 'estado_id');
    }

    /**
    * obtener el estado en formato para mostrar
    */

    public function getEstadoFormateadoAttribute()
    {
        return ucfirst($this->estado); //capitaliza la primera letra del estado.
    }

    /** 
    * verificar si es un estado final (entregado/cancelado) 
    */

    public function getEstadoFinalAttribute()
    {
        return in_array(strtolower($this->estado), ['entregado', 'cancelado']);
    }

    /**
    * scope para buscar estados activos 
    */

    public function scopeActivos($query)
    {
        return $query->whereNotIn('estado', ['cancelado']);
    }
}
