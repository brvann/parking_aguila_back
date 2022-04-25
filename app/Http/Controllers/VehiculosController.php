<?php

namespace App\Http\Controllers;

use App\Models\vehiculos;
use App\Http\Requests\StorevehiculosRequest;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    public function index()
    {
        return Vehiculos::All();
    }

    public function store(StorevehiculosRequest $request)
    {
        return Vehiculos::create($request->all());
    }

    public function show(String $placa)
    {
        $vehiculo = Vehiculos::find($placa);
        $vehiculo->tipoRel;
      return $vehiculo;
    }

    public function update(String $placa, Request $request)
    {
        // $vehiculo = Vehiculos::find($placa);
        // if($vehiculo != null) {
        //     $vehiculo->tiempo_total = $request->tiempo_total;
        //     $vehiculo->save();
        //     return $vehiculo;
        // }
        // return null;
    }

    public function destroy(vehiculos $vehiculos)
    {
        //
    }
    
    public function comienzaMes(){
        $vehiculosResidentes = Vehiculos::where('tipo','residente')->update(array('tiempo_total' => 00.00));

        return $vehiculosResidentes;
    }
}
