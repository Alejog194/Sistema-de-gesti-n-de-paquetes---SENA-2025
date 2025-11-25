<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camionero extends Model
{
    use HasFactory;

    protected $fillable = [ //campos que se pueden asignar masivamente de forma segura. $fillable es una medida de seguridad de Laravel,
    // esta es la lista de atributos que se pueden llenar al crear o actualizar un camionero.
        'documento',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'licencia',
        'telefono',
    ];

    public function camiones()
    {
        return $this->belongsToMany(Camion::class, 'camioneros_camiones');
    }

    public function paquetes()
    {
        return $this->hasMany(Paquete::class, 'camionero_id');
    }

    public function getNomreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido;
    }
}
