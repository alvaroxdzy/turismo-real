<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioSolicitados extends Model
{
   public $table = 'servicios-solicitados';

   public $fillable = [
    'cod_servicio',
    'cod_reserva',
    'fecha',
    'costo'
]
;

public $timestamps = false;
}
