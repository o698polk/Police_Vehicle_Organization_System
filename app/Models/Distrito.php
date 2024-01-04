<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Distrito extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_distrito',
        'codigo_distrito',
        'numero_distrito',
        'id_usuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
