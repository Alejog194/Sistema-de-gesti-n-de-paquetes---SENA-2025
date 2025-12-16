<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $fillable = [ // Campos asignables masivamente
        'user_id',
        'camionero_id', 
        'estado_id',
        'tipo_mercancia_id',  
        'camion_id',          
        'direccion',
        'codigo',
        'descripcion',
        'peso',
        'dimensiones',
        'fecha_envio',
        'fecha_estimada',
        'fecha_entrega_real',
        'costo',
    ];

    // Relaciones
    public function camionero()
    {
        return $this->belongsTo(Camionero::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoPaquete::class);
    }

    public function tipoMercancia()
    {
        return $this->belongsTo(TipoMercancia::class);
    }

    public function camion()
    {
        return $this->belongsTo(Camion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detallesPaquetes()
    {
        return $this->hasMany(DetallePaquete::class);
    }

    // Métodos de ayuda
    public function getDireccionFormateadaAttribute()
    {
        return "Dirección: " . $this->direccion;
    }

    public function getEstaEntregadoAttribute()
    {
        // Ajusta según tus estados reales
        return $this->estado && strtolower($this->estado->estado) === 'entregado';
    }
}