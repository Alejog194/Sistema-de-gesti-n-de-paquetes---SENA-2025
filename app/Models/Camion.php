<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'camiones';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'placa',
        'modelo'
    ];

    /**
     * Un camión puede ser manejado por muchos camioneros.
     * Relación muchos a muchos a través de la tabla intermedia.
     */
    public function camioneros()
    {
        return $this->belongsToMany(Camionero::class, 'camioneros_camiones');
    }

    /**
     * Get the camion's full description.
     */
    public function getDescripcionCompletaAttribute()
    {
        return $this->placa . ' - ' . $this->modelo;
    }
}
