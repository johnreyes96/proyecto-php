<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\TipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
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
            $tiposervicio = TipoServicio::where('TipoServicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tiposervicio = TipoServicio::latest()->paginate($perPage);
        }

        return view('tipo-servicio.index', compact('tiposervicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-servicio.create');
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
        
        TipoServicio::create($requestData);

        return redirect('tipo-servicio')->with('flash_message', 'Tipo Servicio creado');
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
        $tiposervicio = TipoServicio::findOrFail($id);

        return view('tipo-servicio.show', compact('tiposervicio'));
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
        $tiposervicio = TipoServicio::findOrFail($id);

        return view('tipo-servicio.edit', compact('tiposervicio'));
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
        
        $tiposervicio = TipoServicio::findOrFail($id);
        $tiposervicio->update($requestData);

        return redirect('tipo-servicio')->with('flash_message', 'Tipo Servicio actualizado');
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
        TipoServicio::destroy($id);

        return redirect('tipo-servicio')->with('flash_message', 'Tipo Servicio borrado');
    }
}
