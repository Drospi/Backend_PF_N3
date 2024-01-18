<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Personas;
use App\Models\Roles;
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
        $usuario = Personas::all()->first();


        // Verificar si el usuario existe
        if ($usuario) {
            // Realizar left join con la tabla personas
            $persona = Usuarios::join('personas', 'personas.idpersona', '=', 'usuarios.idpersona')
                ->join('roles', 'roles.idrol', '=', 'usuarios.idrol')
                ->get();


            return $persona;
        } else {
            // Manejar el caso en que el usuario no existe
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }
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
        $usuario->idpersona = $persona->id;
        $usuario->idrol = $request->idrol;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = false;
        $usuario->fechacreacion = Carbon::now()->format('Y-m-d');
        $usuario->fechamodificacion = null;
        $usuario->usuariocreacion = $request->usuariocreacion;
        $usuario->usuariomodificacion = null;
        $usuario->save();

        $user = new User();
        $user->id = $usuario->id;
        $user->name = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt($request->clave);
        $user->save();

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
    public function show($idusuario)
    {
        $usuario = Usuarios::where('idusuario', '=', $idusuario)->first();

        // Verificar si el usuario existe
        if ($usuario) {
            // Realizar left join con la tabla personas
            $persona = Usuarios::join('personas', 'personas.idpersona', '=', 'usuarios.idpersona')
                ->select('personas.*', 'usuarios.*')
                ->get();

            return $persona;
        } else {
            // Manejar el caso en que el usuario no existe
            return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
        }
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
        $usuariomodif = Usuarios::where('idusuario', '=', $request->idusuariomodificacion)->first();
        $usuariomodificacion = $usuariomodif->usuario;
        $persona = Personas::where('idpersona', '=', $id)->first();
        $persona->primernombre = $request->primernombre;
        $persona->segundonombre = $request->segundonombre;
        $persona->primerapellido = $request->primerapellido;
        $persona->segundoapellido = $request->segundoapellido;
        $persona->fechacreacion = $persona->fechacreacion;
        $persona->fechamodificacion =Carbon::now()->format('Y-m-d');
        $persona->usuariocreacion = $persona->usuariocreacion;
        $persona->usuariomodificacion = $usuariomodificacion;
        $persona->save();

        $usuario = Usuarios::where('idpersona', '=', $id)->first();
        $usuario->idrol = $request->idrol;
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = false;
        $usuario->fechacreacion = $usuario->fechacreacion;
        $usuario->fechamodificacion = Carbon::now()->format('Y-m-d');;
        $usuario->usuariocreacion = $usuario->usuariocreacion;
        $usuario->usuariomodificacion = $usuariomodificacion;
        $usuario->save();

        $user = User::where('id', '=', $usuario->id)->first();
        $user->name = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt($request->clave);
        $user->save();

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $usuario->id;
        $bitacora->bitacora = 'Se ha modificado el usuario'. $usuario->usuario;
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->hora = Carbon::now()->format('H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->os = $request->server('HTTP_USER_AGENT');
        $bitacora->navegador = $request->server('HTTP_USER_AGENT');
        $bitacora->usuario = $usuariomodificacion;
        $bitacora->save();

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
