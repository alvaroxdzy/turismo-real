<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Servicios; 

/**
 * Class CartController
 * @package App\Http\Controllers\API
 */

class ServicioApiController 
{

    function servicios()
    {
        $servicios=Servicios::all();
        return $servicios;
    }

}
