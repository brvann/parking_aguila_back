<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipos extends Model
{
    protected $primaryKey = "tipo";
    protected $keyType = "string";

    use HasFactory;
    protected $fillable = ["tipo","precio_minuto"];

    public function vehiculos()
    {
        return $this->hasMany('App\Models\vehiculos',"tipo", "tipo");
    }
}
