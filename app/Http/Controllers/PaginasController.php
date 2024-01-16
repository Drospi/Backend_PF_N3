<?php

namespace App\Http\Controllers;

use App\Models\Bitacoras;
use App\Models\Paginas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Paginas::all();
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
        $pagina->fechacreacion = $request->fechacreacion;
        $pagina->fechamodificacion = $request->fechamodificacion;
        $pagina->usuariocreacion = $request->usuariocreacion;
        $pagina->usuariomodificacion = $request->usuariomodificacion;
        $pagina->url = $request->url;
        $pagina->icono = $request->icono;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->estado = $request->estado;
        $pagina->tipo = $request->tipo;

        $pagina->save();

        $bitacora = new Bitacoras();
        $bitacora->idusuario = $request->idusuario;
        $bitacora->bitacora = 'Se ha registrado una nueva pagina';
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
    public function show($id)
    {
        $pagina = Paginas::find($id);
        return $pagina;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paginas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pagina = Paginas::find($id);
        $pagina->fechacreacion = $request->fechacreacion;
        $pagina->fechamodificacion = $request->fechamodificacion;
        $pagina->usuariocreacion = $request->usuariocreacion;
        $pagina->usuariomodificacion = $request->usuariomodificacion;
        $pagina->url = $request->url;
        $pagina->icono = $request->icono;
        $pagina->nombre = $request->nombre;
        $pagina->descripcion = $request->descripcion;
        $pagina->estado = $request->estado;
        $pagina->tipo = $request->tipo;

        $pagina->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pagina = Paginas::find($id);
        $pagina->delete();
    }
}


