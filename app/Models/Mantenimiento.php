<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'asunto',
        'detalle',
        'prevencion',
        'id_usuario',// Permitir campo nulo
         'id_vehiculos', // Permitir campo nul
         'id_personals', // Permitir campo nul
         'id_tipomantenimentos', // Permitir campo nulo
         'id_solicitudmanteniminetos'

];

public function usuario()
{
    return $this->belongsTo(Usuario::class, 'id_usuario');
}
public function vehiculo()
{
    return $this->belongsTo(Vehiculo::class, 'id_vehiculos');
}
public function personal()
{
    return $this->belongsTo(Personal::class, 'id_personals');
}
public function tipomantenimento()
{
    return $this->belongsTo(Tipomantenimento::class, 'id_tipomantenimentos');
}
public function solicitudmantenimineto()
{
    return $this->belongsTo(Solicitudmantenimineto::class, 'id_solicitudmanteniminetos');
}
}
