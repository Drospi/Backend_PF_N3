<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Personas;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        try{


        $persona = new Personas();

        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->primerapellido = $request->primerapellido;
        $persona->segundoapellido = $request->segundoapellido;
        $persona->email = $request->email;
        $persona->fechacreacion = Carbon::now()->format('Y-m-d');
        $persona->fechamodificacion = null;
        $persona->usuariocreacion = $request->usuariocreacion;
        $persona->usuariomodificacion = null;

        $persona->save();

        $usuario = new Usuarios();
        $usuario->idpersona = $persona->idpersona;
        $usuario->idrol = $request->idrol;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = false;
        $usuario->fechacreacion = Carbon::now()->format('Y-m-d');
        $usuario->fechamodificacion = null;
        $usuario->usuariocreacion = $request->usuariocreacion;
        $usuario->usuariomodificacion = null;
        $usuario->save();

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $usuario->id;
        $bitacora->bitacora = 'Se ha registrado un nuevo usuario';
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->hora = Carbon::now()->format('H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->os = $request->server('HTTP_USER_AGENT');
        $bitacora->navegador = $request->server('HTTP_USER_AGENT');
        $bitacora->usuario = $request->usuario;
        $bitacora->save();
        }catch(\Exception $e){

            return $e->getMessage();
        }


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
