<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario_departamento extends Model
{
   public $table = 'Inventario_departamento';

   public $fillable = [
    'cod_departamento',
    'nombre_producto',
    'disponibilidad',
    'detalles'
]
;

public $timestamps = false;
}
