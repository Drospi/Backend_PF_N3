<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Personas::all();
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
        $persona = new Personas();
        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->primerapellido = $request->primerapellido;
        $persona->segundoapellido = $request->segundoapellido;
        $persona->fechacreacion = $request->fechacreacion;
        $persona->fechamodificacion = $request->fechamodificacion;
        $persona->usuariocreacion = $request->usuariocreacion;
        $persona->usuariomodificacion = $request->usuariomodificacion;

        $persona->save();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $persona = Personas::find($id);
        return $persona;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $persona = Personas::find($id);
        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->primerapellido = $request->primerapellido;
        $persona->segundoapellido = $request->segundoapellido;
        $persona->fechacreacion = $request->fechacreacion;
        $persona->fechamodificacion = $request->fechamodificacion;
        $persona->usuariocreacion = $request->usuariocreacion;
        $persona->usuariomodificacion = $request->usuariomodificacion;

        $persona->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $persona = Personas::find($id);
        $persona->delete();
    }
}
