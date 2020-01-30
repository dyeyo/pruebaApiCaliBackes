<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable=['nombre', 'cedula', 'celular', 'direccion', 'ciudad', 'id_agente'];

    public function agente(){
        return $this->belongsTo(Agente::class);
    }
}
