<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    /**
     * los atributos que pueden ser llenado masivamente
     */
    protected $fillable = [
        'camionero_id', //dueño principal del paquete.
        'estado_id', //estado del paquete.
        //'tipo_mercancia_id', //tipo de mercancía del paquete.
        'direccion', //dirección de entrega del paquete.
    ];

    /**
     * un paquete pertenece a un camionero (dueño principal).
     * relacion uno a muchos inversa.
     */
    public function camionero()
    {
        return $this->belongsTo(Camionero::class, 'camionero_id');
    }

    /**
     * un paquete tiene un estado.
     * relacion uno a muchos inversa.
     */
    public function estado()                       
    {
        return $this->belongsTo(EstadoPaquete::class, 'estado_id');
    }

    /**
     * un paquete tiene muchos detalles de paquete.
     * relacion uno a muchos.
     */
    public function detallesPaquetes()
    {
        return $this->hasMany(DetallePaquete::class, 'paquete_id');
    }

    /**
     * obtener la direccion formateada del paquete.
     */
    public function getDireccionFormateadaAttribute()
    {
        return " Dirección: " . $this->direccion;
    }

    /** verificar si el paquete está entregado */
    public function getEstaEntregadoAttribute()
    {
        return $this->estado->estado === 'Paquete Entregado';  //verificar este codigo si requiere algun cambio mas adelante, 25/11/2025 fecha creada.
    }
}