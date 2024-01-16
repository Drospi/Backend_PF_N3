<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Roles::all();
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
        $rol = new Roles();
        $rol->rol = $request->rol;
        $rol->fechacreacion = Carbon::now()->format('Y-m-d');
        $rol->fechamodificacion = null;
        $rol->usuariocreacion = $request->usuariocreacion;
        $rol->usuariomodificacion = null;
        $rol->save();

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $request->idusuario;
        $bitacora->bitacora = 'Se ha registrado un nuevo rol';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->hora = Carbon::now()->format('H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->os = $request->server('HTTP_USER_AGENT');
        $bitacora->navegador = $request->server('HTTP_USER_AGENT');
        $bitacora->usuario = $request->usuariocreacion;
        $bitacora->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $id)
    {
        return Roles::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roles $id)
    {
        $rol = Roles::find($id);
        $rol->rol = $request->rol;
        $rol->fechacreacion = Carbon::now()->format('Y-m-d');
        $rol->fechamodificacion = null;
        $rol->usuariocreacion = $request->usuariocreacion;
        $rol->usuariomodificacion = null;
        $rol->save();

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $request->idusuario;
        $bitacora->bitacora = 'Se ha editado el rol con id: ' . $rol->idrol;
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->hora = Carbon::now()->format('H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->os = $request->server('HTTP_USER_AGENT');
        $bitacora->navegador = $request->server('HTTP_USER_AGENT');
        $bitacora->usuario = $request->usuariocreacion;
        $bitacora->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $id)
    {
        $rol = Roles::find($id);
        $rol->delete();
    }
}
