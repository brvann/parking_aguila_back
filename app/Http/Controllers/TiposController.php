<?php

namespace App\Http\Controllers;

use App\Models\tipos;
use App\Http\Requests\StoretiposRequest;
use App\Http\Requests\UpdatetiposRequest;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = tipos::All();
        foreach($tipos as $tipo) $tipo->vehiculos;
        return $tipos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretiposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretiposRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function show(tipos $tipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function edit(tipos $tipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetiposRequest  $request
     * @param  \App\Models\tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetiposRequest $request, tipos $tipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipos $tipos)
    {
        //
    }
}
