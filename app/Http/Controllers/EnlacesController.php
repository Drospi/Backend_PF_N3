<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Enlaces;
use App\Models\Paginas;
use App\Models\Usuarios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enlace = Enlaces::all()->first();
        if ($enlace) {
            // Realizar left join con la tabla personas
            $persona = Enlaces::join('paginas', 'paginas.id', '=', 'enlaces.idpagina')
                ->select('paginas.*', 'enlaces.*')
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
        $pagina = new Paginas();
        $pagina->fechacreacion =  Carbon::now()->format('Y-m-d');
        $pagina->fechamodificacion = null;
        $usuariocreacion = Usuarios::find($request->idusuariocreacion);
        $pagina->usuariocreacion = $usuariocreacion->usuario;
        $pagina->usuariomodificacion = null;
        $pagina->url = $request->url;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->tipo = $request->tipo;

        $pagina->save();
        $enlace = new Enlaces();
        $enlace->idpagina = $pagina->id;
        $enlace->descripcion = $request->descripcion;
        $enlace->fechacreacion =  Carbon::now()->format('Y-m-d');
        $enlace->fechamodificacion = null;
        $enlace->usuariocreacion = $usuariocreacion->usuario;
        $enlace->usuariomodificacion = null;

        $enlace->save();

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $request->idusuariocreacion;
        $bitacora->bitacora = 'Se ha registrado un nuevo enlace'.$pagina->url. ' con su pagina'.$pagina->nombre;
        $bitacora->fecha = Carbon::now()->format('Y-m-d');
        $bitacora->hora = Carbon::now()->format('H:i:s');
        $bitacora->ip = $request->ip();
        $bitacora->os = $request->server('HTTP_USER_AGENT');
        $bitacora->navegador = $request->server('HTTP_USER_AGENT');
        $bitacora->usuario = $usuariocreacion->usuario;
        $bitacora->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $enlace = Enlaces::find($id);
        if ($enlace) {
            // Realizar left join con la tabla personas
            $persona = Enlaces::join('paginas', 'paginas.id', '=', 'enlaces.idpagina')
                ->select('paginas.*', 'enlaces.*')
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

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $request->idusuario;
        $bitacora->bitacora = 'Se ha editado el enlace con id: ' . $enlace->idenlace;
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
    public function destroy($id)
    {
        $enlace = Enlaces::find($id);
        $enlace->delete();
    }
}

