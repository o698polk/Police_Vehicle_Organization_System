<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudmantenimineto extends Model
{
    use HasFactory;
    protected $fillable = [
            'nombre_apellido',
           'identificacion',
            'num_telefono',
            'detalle',
            'id_usuario',// Permitir campo nulo
             'id_vehiculos', // Permitir campo nul
            'id_tipomantenimentos', // Permitir campo nulo

    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculos');
    }
    public function tipomantenimento()
    {
        return $this->belongsTo(Tipomantenimento::class, 'id_tipomantenimentos');
    }
}
