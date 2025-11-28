<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    /**         
     * los atributos que pueden ser llenados masivamente.
     */
    protected $table = 'camiones';
    protected $fillable = [
        'camionero_id', //dueño principal del camión.
        'placa',
        'modelo'
        //'marca',
        //'capacidad_kg',
    ];

    /**
     * Un camion pertenece a un camionero (dueño principal).
     * relacion uno a muchos inversa.
     */
    public function camionero()
    {
        return $this->belongsTo(Camionero::class, 'camionero_id');
    }

    /**     
     * Un camión es manejado por muchos camioneros 
     * Relación muchos a muchos a través de la tabla pivote.
     */
    public function camioneros()
    {
        return $this->belongsToMany(Camionero::class, 'camioneros_camiones');
    }   

    /**
     * Obtener la descripción completa del camión.
     */
    public function getDescripcionCompletaAttribute()
    {
        return $this->modelo . ' - ' . $this->placa;
    }
}
