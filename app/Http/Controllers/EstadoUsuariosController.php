<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\EstadoUsuario;
use Illuminate\Http\Request;

class EstadoUsuariosController extends Controller
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
            $estadousuarios = EstadoUsuario::where('Estado', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $estadousuarios = EstadoUsuario::latest()->paginate($perPage);
        }

        return view('estado-usuarios.index', compact('estadousuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('estado-usuarios.create');
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
        
        EstadoUsuario::create($requestData);

        return redirect('estado-usuarios')->with('flash_message', 'Estado creado');
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
        $estadousuario = EstadoUsuario::findOrFail($id);

        return view('estado-usuarios.show', compact('estadousuario'));
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
        $estadousuario = EstadoUsuario::findOrFail($id);

        return view('estado-usuarios.edit', compact('estadousuario'));
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
        
        $estadousuario = EstadoUsuario::findOrFail($id);
        $estadousuario->update($requestData);

        return redirect('estado-usuarios')->with('flash_message', 'Estado actualizado');
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
        EstadoUsuario::destroy($id);

        return redirect('estado-usuarios')->with('flash_message', 'Estado borrado');
    }
}
