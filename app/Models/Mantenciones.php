<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenciones extends Model
{
    public $table = 'mantenciones';

 public $fillable = [
    'codigo_mantencion',
    'cod_departamento',
    'fecha',
    'encargado',
    'observaciones',
    'usuario'
]
;
public $timestamps = false;
}
