<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 
use App\Models\Inventario_departamento; 

class ReservasController extends Controller
{




    public function create()
    {
        return view('crear-reservas');
    }

    public function filterComuna(Request $request)
    {
        $comuna = $request->comunas;
        $departamentoComuna = Departamento::where('comuna',$comuna)->get();

        return $departamentoComuna;

    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
