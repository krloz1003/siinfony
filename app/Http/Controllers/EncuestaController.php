<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $encuesta = new \App\Models\Encuesta;
        $encuesta->fecha_registro               = $request->fecha_registro;
        $encuesta->recepcion_atencion           = $request->recepcion_atencion;
        $encuesta->recepcion_tiempo_espera      = $request->recepcion_tiempo_espera;
        $encuesta->tramite_realizado            = $request->tramite_realizado;
        $encuesta->id_servidor_publico          = $request->id_servidor_publico;
        $encuesta->id_tipo_servidor_publico     = $request->id_tipo_servidor_publico;
        $encuesta->servidor_atencion            = $request->servidor_atencion;
        $encuesta->servidor_tiempo_atencion     = $request->servidor_tiempo_atencion;
        $encuesta->observaciones                = $request->observaciones;
        $encuesta->save();

        return response()->json(['message' => 'Los datos se almacenarón correctamente.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEncuestas()
    {
        $encuestas = \App\Models\Encuesta::orderBy('created_at', 'desc')->get();

        return response()->json($encuestas);
    }
}
