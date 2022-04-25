<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tipos;

class vehiculos extends Model
{
    // public $timestamps = false;
    protected $primaryKey = "placa";
    protected $keyType = "string";
    public $incrementing = false;
    
    protected $fillable = ["placa", "descripcion", "tipo", "tiempo_total", "saldo_vencido"];

    public function tipoRel()
    {
        return $this->belongsTo('App\Models\tipos',"tipo","tipo");
    }

    public function estancia()
    {
        return $this->hasOne('App\Models\entradas_salidas',"placa","placa");
    }
}
