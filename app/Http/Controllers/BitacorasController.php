<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use Illuminate\Http\Request;

class BitacorasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bitacoras::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bitacora = new Bitacoras();
        $bitacora->idusuario = $request->idusuario;
        $bitacora->bitacora = $request->bitacora;
        $bitacora->fecha = $request->fecha;
        $bitacora->hora = $request->hora;
        $bitacora->ip = $request->ip;
        $bitacora->os = $request->os;
        $bitacora->navegador = $request->navegador;
        $bitacora->usuario = $request->usuario;
        $bitacora->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Bitacoras::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bitacoras $bitacoras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bitacora = Bitacoras::find($id);
        $bitacora->idusuario = $request->idusuario;
        $bitacora->bitacora = $request->bitacora;
        $bitacora->fecha = $request->fecha;
        $bitacora->hora = $request->hora;
        $bitacora->ip = $request->ip;
        $bitacora->os = $request->os;
        $bitacora->navegador = $request->navegador;
        $bitacora->usuario = $request->usuario;
        $bitacora->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bitacoras = Bitacoras::find($id);
        $bitacoras->delete();
    }
}
