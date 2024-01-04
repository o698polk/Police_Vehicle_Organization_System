<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;
    protected $fillable = [

        'apellidos',
        'nombres',
        'contacto',
        'tipo',
        'detalle',
        'id_circuito',
        'id_subcircuito',
  ];


public function circuito()
{
  return $this->belongsTo(Circuito::class, 'id_circuito');
}
public function subcircuito()
{
  return $this->belongsTo(Subcircuito::class, 'id_subcircuito');
}
}
