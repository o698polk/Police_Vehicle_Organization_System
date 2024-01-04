<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $fillable = [
       'identificacion',
        'nombre_apellido',
        'fecha_nacimiento',
        'tipo_sangre',
       'ciudad_nacimeinto',
        'num_telefono',
        'rango',
        'id_usuario',
        'id_dependencia',
        'id_vehiculos',
];

public function usuario()
{
    return $this->belongsTo(Usuario::class, 'id_usuario');
}
public function dependencia()
{
    return $this->belongsTo(Dependencia::class, 'id_dependencia');
}
public function vehiculos()
{
    return $this->belongsTo(Vehiculo::class, 'id_vehiculos');
}

}
