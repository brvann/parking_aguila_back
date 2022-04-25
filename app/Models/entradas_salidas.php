<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entradas_salidas extends Model
{

    protected $fillable = ["id","placa","hora_entrada","hora_salida","eliminado"];

    public function vehiculos()
    {
        return $this->hasMany('App\vehiculos',"placa", "placa");
    }
}
