<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    public $table = 'reservas';

 public $fillable = [
    'fecha_creacion',
    'rut',
    'cod_departamento',
    'fecha_desde',
    'fecha_hasta',
    'costo_base',
    'estado'
]
;
public $timestamps = false;
}