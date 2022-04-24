<?php

namespace App\Http\Controllers;

use App\Models\entradas_salidas;
use App\Http\Requests\Storeentradas_salidasRequest;
use App\Http\Requests\Updateentradas_salidasRequest;

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

    public function altaEntrada(Storeentradas_salidasRequest $request)
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
    public function show(entradas_salidas $entradas_salidas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateentradas_salidasRequest  $request
     * @param  \App\Models\entradas_salidas  $entradas_salidas
     * @return \Illuminate\Http\Response
     */
    public function update(Updateentradas_salidasRequest $request, entradas_salidas $entradas_salidas)
    {
        //
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
}
