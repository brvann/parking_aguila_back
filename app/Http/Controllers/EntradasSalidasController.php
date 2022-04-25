<?php

namespace App\Http\Controllers;

use App\Models\entradas_salidas;
use App\Models\vehiculos;
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
        $estancias = entradas_salidas::where('eliminado',false)->get();
        //return date("h:i:s");

        return $estancias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeentradas_salidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeentradas_salidasRequest $request)
    {
        $vehiculo = Vehiculos::find($request->placa);
        
        if($vehiculo == null) {
            
            $vehiculo = new Vehiculos;
            $vehiculo->placa= $request->placa;
            $vehiculo->descripcion= 'no_residente';
            $vehiculo->tipo= 'no_residente';
            $vehiculo->save();
        }

        $estancia = entradas_salidas::where('placa',$request->placa)->where('eliminado', false)->first();
        if($estancia != null) {
            $hora_salida = date("h:i:s");
            $estancia->hora_salida = $hora_salida;
            $estancia->eliminado = true;
            $estancia->save();
            $hora_entrada = $estancia->hora_entrada;
            $entrada = new \Carbon\Carbon($hora_entrada);
            $salida = new \Carbon\Carbon($hora_salida);
            $minutesDiff = $entrada->diffInMinutes($salida);

            $vehiculo = Vehiculos::find($request->placa);
            $vehiculo->tiempo_total += $minutesDiff;
            $vehiculo->saldo_vencido += $vehiculo->tiempo_total * $vehiculo->tipoRel->precio_minuto;
            $vehiculo->save();

            return $estancia;
        }
        else {
            $hora_entrada = date("h:i:s");
            $estancia = new entradas_salidas;
            $estancia->hora_entrada = $hora_entrada;
            $estancia->placa = $request->placa;
            $estancia->save();
            return $estancia;
        }
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

    public function update(Request $request, String $placa )//Ala Salida
    {
        $hora_salida = date("h:i:s");
        // $estancia = new entradas_salidas;
        // $estancia->hora_salida = $hora_salida;
        // $estancia->placa = $request->placa;
        // $estancia->save();
        // return $estancia;
        
        $estancia = entradas_salidas::where('placa',$placa)->where('eliminado', false)->first();
        if($estancia != null) {
            $estancia->hora_salida = $hora_salida;
            $estancia->save();
            $hora_entrada = $estancia->hora_entrada;
            $entrada = new \Carbon\Carbon($hora_entrada);
            $salida = new \Carbon\Carbon($hora_salida);
            $minutesDiff = $entrada->diffInMinutes($salida);

            $vehiculo = Vehiculos::find($request->placa);
            $vehiculo->tiempo_total += $minutesDiff;
            $vehiculo->saldo_vencido = $vehiculo->tiempo_total * $vehiculo->tipoRel->precio_minuto;
            $vehiculo->save();

            return $estancia;
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

    public function comienzaMes(){
        
        $vehiculos = 'App\Models\Vehiculos'::where('tipo','oficial')->get();

        foreach($vehiculos as $vehiculo) {
            $estancia = entradas_salidas::find($vehiculo->estancia->id);
            $estancia->eliminado = true;
            $estancia->save();
        }
        
        return true;
    }
}