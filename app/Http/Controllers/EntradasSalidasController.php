<?php

namespace App\Http\Controllers;

use App\Models\entradas_salidas;
use App\Http\Requests\Storeentradas_salidasRequest;
use Illuminate\Http\Request;

class EntradasSalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return entradas_salidas::All();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeentradas_salidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeentradas_salidasRequest $request)
    {
        $request->validate([
            'hora_entrada' => 'required'
        ]);

        return entradas_salidas::create($request->all());
    }

    public function altaSalida(Storeentradas_salidasRequest $request)
    {
        $request->validate([
            'hora_salida' => 'required'
        ]);

        $id = entradas_salidas::where('placa',$request->placa)->get();
        
        $salida = entradas_salidas::findOrFail($id->map->only(['id']))->first();
        $salida -> hora_salida = $request->get('hora_salida');
        $salida->save();

        $srt = json_decode($id, true);
        
        echo $id->get('hora_salida');
        return $id->get('hora_salida');
        

        $hora_entrada = new \Carbon\Carbon($id->get('hora_salida'));
        $hora_salida = new \Carbon\Carbon($id->map->only(['hora_entrada']));
        $minutesDiff = $hora_entrada->diffInMinutes($hora_salida);

        return $minutesDiff;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entradas_salidas  $entradas_salidas
     * @return \Illuminate\Http\Response
     */
    public function show(String $placa)
    {
      return entradas_salidas::where('placa',$placa)->first();
    }

    public function update(Request $request, String $placa )
    {
       return "s";
        $request->validate([
            'hora_salida' => 'required'
        ]);
        
        $vehiculo = entradas_salidas::where('placa',$placa)->first();
        if($vehiculo != null) {
            $vehiculo->hora_salida = $request->hora_salida;

            // $hora_entrada = new \Carbon\Carbon($vehiculo->hora_salida);
            // $hora_salida = new \Carbon\Carbon($request->hora_salida);
            // $minutesDiff = $hora_entrada->diffInMinutes($hora_salida);

            $vehiculo->save();
            return $vehiculo;
        }
        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entradas_salidas  $entradas_salidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(entradas_salidas $entradas_salidas)
    {
        //
    }

    public function comienzaMes(String $tipo){
        
        $vehiculosResidentes = Vehiculos::where('tipo',$tipo)->update(array('tiempo_total' => 00.00));

        return $vehiculosResidentes;
    }
}
