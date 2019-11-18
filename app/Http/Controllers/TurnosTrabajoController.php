<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\TurnosTrabajo;
use Illuminate\Http\Request;

class TurnosTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $turnostrabajo = TurnosTrabajo::where('TurnoTrabajo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $turnostrabajo = TurnosTrabajo::latest()->paginate($perPage);
        }

        return view('turnos-trabajo.index', compact('turnostrabajo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('turnos-trabajo.create');
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
        
        TurnosTrabajo::create($requestData);

        return redirect('turnos-trabajo')->with('flash_message', 'Turnos trabajo creado');
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
        $turnostrabajo = TurnosTrabajo::findOrFail($id);

        return view('turnos-trabajo.show', compact('turnostrabajo'));
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
        $turnostrabajo = TurnosTrabajo::findOrFail($id);

        return view('turnos-trabajo.edit', compact('turnostrabajo'));
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
        
        $turnostrabajo = TurnosTrabajo::findOrFail($id);
        $turnostrabajo->update($requestData);

        return redirect('turnos-trabajo')->with('flash_message', 'Turnos trabajo actualizado');
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
        TurnosTrabajo::destroy($id);

        return redirect('turnos-trabajo')->with('flash_message', 'Turnos trabajo borrado');
    }
}
