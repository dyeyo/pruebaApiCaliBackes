<?php

namespace App\Http\Controllers;

use App\Agente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentesController extends Controller
{

    public function getData(){
        $agentes=Agente::all();
        return response()->json($agentes);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cedula'=>'required',
            'agente'=>'required',
            'nombre'=>'required',
        ]);
        if ($validator->fails()) {
            $data=[
                'code'=>400,
                'status'=>'error',
                'message'=>'Faltan datos'
            ];
        }else{
            $agente = Agente::create($request->all());
            $data=[
                'code'=>200,
                'status'=>'success',
                'agente'=>$agente
            ];
        }

        return response()->json($data, $data['code']);
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
        $validator = Validator::make($request->all(), [
            'cedula'=>'required',
            'agente'=>'required',
            'nombre'=>'required',
        ]);
        if ($validator->fails()) {
            $data=[
                'code'=>400,
                'status'=>'error',
                'message'=>'Faltan datos'
            ];
        }else{
        $agente->update($request->all());
        $data=[
            'code'=>200,
            'status'=>'success',
            'agente'=>$agente
        ];
    }

    return response()->json($data, $data['code']);
    }

    public function delete($id)
    {
        $agente = Agente::findOrFail($id);
        $agente->delete();
        return 204;
    }

}
