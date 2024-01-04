<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_circuito',
        'codigo_circuito',
        'numero_circuito',
        'id_parroquia',
        'id_usuario',
    ];

    public function Parroquia()
  {
      return $this->belongsTo(Parroquia::class, 'id_parroquia');
  }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
