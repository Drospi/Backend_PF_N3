<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UsuariosController extends Controller implements JWTSubject
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuarios::all();
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
        $usuario = new Usuarios();
        $usuario->idpersona = $request->idpersona;
        $usuario->idrol = $request->idrol;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = $request->habilitado;
        $usuario->fechacreacion = $request->fechacreacion;
        $usuario->fechamodificacion = $request->fechamodificacion;
        $usuario->usuariocreacion = $request->usuariocreacion;
        $usuario->usuariomodificacion = $request->usuariomodificacion;
        $usuario->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = Usuarios::find($id);
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuarios::find($id);
        $usuario->idrol = $request->idrol;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = $request->habilitado;
        $usuario->fechacreacion = $request->fechacreacion;
        $usuario->fechamodificacion = $request->fechamodificacion;
        $usuario->usuariocreacion = $request->usuariocreacion;
        $usuario->usuariomodificacion = $request->usuariomodificacion;

        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}

