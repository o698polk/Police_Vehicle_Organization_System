<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_apellido',
        'correo',
        'usuario',
        'id_roles',
        'clave',
    ];

    public function Role()
    {
        return $this->belongsTo(Role::class, 'id_roles');
    }
 /*   protected static function boot()
    {
        parent::boot();

        // Evento "saving" para encriptar automáticamente la clave antes de guardar
        static::saving(function ($usuario) {
            // Verificar si la clave ha sido modificada
            if ($usuario->isDirty('clave')) {
                $usuario->clave = Hash::make($usuario->clave);
            }
        });
    }*/
}
