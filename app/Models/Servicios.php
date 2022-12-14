<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
   public $table = 'servicios';

   public $fillable = [
    'codigo_servicio',
    'nombre_servicio',
    'disponibilidad',
    'detalles',
    'function'
]
;

public $timestamps = false;
}
