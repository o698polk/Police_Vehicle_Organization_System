<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisione extends Model
{
    use HasFactory;

    protected $fillable = [
        'pago_matricula',
         'págo_rodaje',
         'no_deuda_gad',
         'copia_cedula',
         'detalle',
         'recomendaciones',
         'id_usuario',// Permitir campo nulo
         'id_vehiculos', // Permitir campo nul
        

];

public function usuario()
{
    return $this->belongsTo(Usuario::class, 'id_usuario');
}
public function vehiculo()
{
    return $this->belongsTo(Vehiculo::class, 'id_vehiculos');
}


}
