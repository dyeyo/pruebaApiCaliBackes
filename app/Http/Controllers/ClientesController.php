<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function getData(){
        $clients=Clientes::all();
        return response()->json($clients);
    }
    public function getAgentes(){
        $clients=Clientes::select('id','nombre')->get();
        return response()->json($clients);
    }

    public function store(Request $request){
        $cliente=Clientes::create($request->all());
        return response()->json($cliente);
    }

    public function show($id)
    {

        $cliente = Clientes::findOrFail($id);
        return response()->json([
            'error' => false,
            'cliente'  => $cliente,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->update($request->all());

        return $cliente;
    }

    public function delete($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return 204;
    }

}
