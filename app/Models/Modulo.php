<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    protected $fillable = [

        'nombre_modulos',
         'ruta',
         'id_roles',

      ];

      public function Role()
      {
          return $this->belongsTo(Role::class, 'id_roles');
      }
}
