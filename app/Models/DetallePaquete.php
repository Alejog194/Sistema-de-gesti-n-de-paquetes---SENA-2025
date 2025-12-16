<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePaquete extends Model
{
    use HasFactory;

    protected $table = 'detalles_paquetes';
    
    protected $fillable = [
        'paquete_id',
        'dimension',
        'peso',
        'fecha_entrega',
    ];

    public function paquete()
    {
        return $this->belongsTo(Paquete::class);
    }
}