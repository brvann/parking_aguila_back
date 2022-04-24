<?php

namespace App\Http\Controllers;

use App\Models\vehiculos;
use App\Http\Requests\StorevehiculosRequest;
use App\Http\Requests\UpdatevehiculosRequest;

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
      return Vehiculos::find($placa);
    }

    public function update(String $placa, Request $request)
    {
        
        $vehiculo = Vehiculo::find($placa);
        if($vehiculo != null) {
            $vehiculo->hora_salida = $request->hora_salida;
            $vehiculo->save();
            return $vehiculo;
        }
        return null;
    }

    public function destroy(vehiculos $vehiculos)
    {
        //
    }
    
    public function comienzaMes(String $tipo){
        $vehiculosResidentes = Vehiculos::where('tipo',$request->$tipo)->update(array('tiempo_total' => 00.00));
        return $vehiculosResidentes;
    }
}
