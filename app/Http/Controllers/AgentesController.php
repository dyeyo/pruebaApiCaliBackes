<?php

namespace App\Http\Controllers;

use App\Agente;
use Illuminate\Http\Request;

class AgentesController extends Controller
{

    public function getData(){
        $agentes=Agente::all();
        return response()->json($agentes);
    }


    public function store(Request $request)
    {
        return Agente::create($request->all());
    }


    public function show($id)
    {
        $agente = Agente::findOrFail($id);
        return response()->json([
            'error' => false,
            'agente'  => $agente,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $agente = Agente::findOrFail($id);
        $agente->update($request->all());
        return $agente;
    }

    public function delete($id)
    {
        $agente = Agente::findOrFail($id);
        $agente->delete();
        return 204;
    }

}
