<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenmovilizacione extends Model
{
    use HasFactory;
     protected $fillable = [
            'motivo',
            'ruta',
            'km_inicial',
            'dato_ocupantes',
            'id_usuario',// Permitir campo nulo
             'id_vehiculos', // Permitir campo nul
            'id_personals_conductor',
            'id_personals_solicitante',
            'id_dependencia',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculos');
    }

   

   public function personal1()
{
    return $this->belongsTo(Personal::class, 'id_personals_conductor');
}

public function personal2()
{
    return $this->belongsTo(Personal::class, 'id_personals_solicitante');
}

   

     public function dependencia()
    {
    return $this->belongsTo(Dependencia::class, 'id_dependencia');
   }
}
