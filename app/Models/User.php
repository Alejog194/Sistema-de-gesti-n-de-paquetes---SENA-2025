<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // ✅ AGREGADO: Para permitir asignación masiva del rol
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ✅ MÉTODOS CORRECTOS (eliminamos up() y down() que son para migraciones)
    
    /**
     * Verifica si el usuario tiene rol de administrador
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Verifica si el usuario tiene rol de usuario normal
     */
    public function isUser()
    {
        return $this->role === 'user';  
    }

    /**
     * Relación con los paquetes del usuario.
     */
    public function paquetes()
    {
        return $this->hasMany(Paquete::class);
    }
}
