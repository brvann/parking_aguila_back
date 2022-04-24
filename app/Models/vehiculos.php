<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculos extends Model
{
    // public $timestamps = false;
    protected $primaryKey = "placa";
    protected $keyType = "string";
    public $incrementing = false;
    
    protected $fillable = ["placa", "descripcion", "tipo"];
}
