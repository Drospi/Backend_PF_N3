<?php

namespace App\Http\Controllers;

use App\Models\Enlaces;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Enlaces::all();
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
        $enlace = new Enlaces();
        $enlace->idpagina = $request->idpagina;
        $enlace->idrol = $request->idrol;
        $enlace->descripcion = $request->descripcion;
        $enlace->fechacreacion = $request->fechacreacion;
        $enlace->fechamodificacion = $request->fechamodificacion;
        $enlace->usuariocreacion = $request->usuariocreacion;
        $enlace->usuariomodificacion = $request->usuariomodificacion;

        $enlace->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enlace = Enlaces::find($id);
        return $enlace;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enlaces $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enlace = Enlaces::find($id);
        $enlace->idpagina = $request->idpagina;
        $enlace->idrol = $request->idrol;
        $enlace->descripcion = $request->descripcion;
        $enlace->fechacreacion = $request->fechacreacion;
        $enlace->fechamodificacion = $request->fechamodificacion;
        $enlace->usuariocreacion = $request->usuariocreacion;
        $enlace->usuariomodificacion = $request->usuariomodificacion;

        $enlace->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enlace = Enlaces::find($id);
        $enlace->delete();
    }
}

