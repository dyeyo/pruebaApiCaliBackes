<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    protected $fillable=['cedula', 'agente', 'nombre'];

    public function  clientes(){
        return $this->hasMany(Clientes::class);
    }
}
