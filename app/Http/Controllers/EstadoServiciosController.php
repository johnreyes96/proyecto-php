<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EstadoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        if (!empty($keyword)) {
            $estadoservicios = EstadoServicio::where('IdTipoServicio', 'LIKE', "%$keyword%")
                ->orWhere('EstadoServicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $estadoservicios = EstadoServicio::latest()->paginate($perPage);
        }

        return view('estado-servicios.index', compact('estadoservicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tipoServicios = DB::select('CALL getAllTipoServicios()');
        return view('estado-servicios.create', compact('tipoServicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        EstadoServicio::create($requestData);

        return redirect('estado-servicios')->with('flash_message', 'Estado servicio creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $estadoservicio = EstadoServicio::join('tipo_servicios', 'estado_servicios.IdTipoServicio', '=', 'tipo_servicios.id')
            ->findOrFail($id);

        return view('estado-servicios.show', compact('estadoservicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $tipoServicios = DB::select('CALL getAllTipoServicios()');
        $estadoservicio = EstadoServicio::findOrFail($id);

        return view('estado-servicios.edit', compact('estadoservicio', 'tipoServicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $estadoservicio = EstadoServicio::findOrFail($id);
        $estadoservicio->update($requestData);

        return redirect('estado-servicios')->with('flash_message', 'Estado servicio actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        EstadoServicio::destroy($id);

        return redirect('estado-servicios')->with('flash_message', 'Estado servicio borrado');
    }
}
