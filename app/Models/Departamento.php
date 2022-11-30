<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public $table = 'departamento';
    
    public $fillable = [
        'codigo_departamento',
        'direccion',
        'comuna',
        'region',
        'numero',
        'cantidad_habitaciones',
        'cantidad_banos',
        'estado',
        'usuario',
        'imagen'
    ]
    ;
    public $timestamps = false;
}
