<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ModalidadServicio;
use Illuminate\Http\Request;

class ModalidadServicioController extends Controller
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
            $modalidadservicio = ModalidadServicio::where('ModalidadServicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $modalidadservicio = ModalidadServicio::latest()->paginate($perPage);
        }

        return view('modalidad-servicio.index', compact('modalidadservicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modalidad-servicio.create');
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
        
        ModalidadServicio::create($requestData);

        return redirect('modalidad-servicio')->with('flash_message', 'Modalidad servicio creado');
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
        $modalidadservicio = ModalidadServicio::findOrFail($id);

        return view('modalidad-servicio.show', compact('modalidadservicio'));
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
        $modalidadservicio = ModalidadServicio::findOrFail($id);

        return view('modalidad-servicio.edit', compact('modalidadservicio'));
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
        
        $modalidadservicio = ModalidadServicio::findOrFail($id);
        $modalidadservicio->update($requestData);

        return redirect('modalidad-servicio')->with('flash_message', 'Modalidad servicio actualizado');
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
        ModalidadServicio::destroy($id);

        return redirect('modalidad-servicio')->with('flash_message', 'Modalidad servicio borrado');
    }
}
