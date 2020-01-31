<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'cedula'=>'required',
            'nombre'=>'required',
            'celular'=>'required',
            'direccion'=>'required',
            'ciudad'=>'required',
            'id_agente'=>'required',
        ]);
        if ($validator->fails()) {
            $data=[
                'code'=>400,
                'status'=>'error',
                'message'=>'Faltan datos'
            ];
        }else{
            $cliente=Clientes::create($request->all());
            $data=[
                'code'=>200,
                'status'=>'success',
                'cliente'=>$cliente
            ];
        }
        return response()->json($data, $data['code']);
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

        $validator = Validator::make($request->all(), [
            'cedula'=>'required',
            'nombre'=>'required',
            'celular'=>'required',
            'direccion'=>'required',
            'ciudad'=>'required',
            'id_agente'=>'required',
        ]);
        if ($validator->fails()) {
            $data=[
                'code'=>400,
                'status'=>'error',
                'message'=>'Faltan datos'
            ];
        }else{
            $cliente->update($request->all());
            $data=[
                'code'=>200,
                'status'=>'success',
                '$cliente'=>$cliente
            ];
        }
        return response()->json($data, $data['code']);

    }

    public function delete($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return 204;
    }

}
