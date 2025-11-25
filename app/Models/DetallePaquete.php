<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePaquete extends Model
{
    use HasFactory;


    /**  
     * 
    */

    protected $fillable = [
    'paquete_id', //clave foránea del paquete.
    'tipo_mercancia_id', //clave foránea del tipo de mercancía.
    'dimension', //dimensión del paquete.
    'peso', //peso del paquete.
    'fecha_entrega', //fecha de entrega del paquete.
    ];

    /** 
    * un detalle de paquete pertenece a un paquete.
    * relación muchos a uno.
    */

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'paquete_id');
    }

    /**
    *   un detalle tiene un tipo de mercancia
    * relación muchos a uno.
    */

    public function tipoMercancia()
    {
        return $this->belongsTo(TipoMercancia::class, 'tipo_mercancia_id');
    }

    /** 
    * calcular el volumen del paquete.
    *ejemplo 20x30x15 -> 900 cm³
    */

    public function getVolumenAttribute()
    {
        //código IA
        /**
        *  if (preg_match('/(\d+)x(\d+)x(\d+)/', $this->dimension, $matches)) {
        *          return $matches[1] * $matches[2] * $matches[3];
        * }
        * return 0;
        */

        if(preg_match('/^(\d+)x(\d+)x(\d+)$/', $this->dimension, $matches)) { 
            $largo = (int)$matches[1];
            $ancho = (int)$matches[2];
            $alto = (int)$matches[3];
            return $largo * $ancho * $alto; // volumen en cm³
        }
    }

    /**
    * Obtener el peso numérico (ejemplo: "5.5 kg" → 5.5)
    */
    public function getPesoNumericoAttribute()
    {
        if (preg_match('/([\d.]+)/', $this->peso, $matches)) {
            return floatval($matches[1]);
        }
        return 0;
    }

    /**
    * verificar si la entrega está entregada
    */

    public function gesEstaAtrasadoAttribute()
    {
        return $this->fecha_entrega < now()->toDateString();
    }


}