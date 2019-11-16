<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MarcaVehiculo;
use Illuminate\Http\Request;

class MarcaVehiculosController extends Controller
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
            $marcavehiculos = MarcaVehiculo::where('Marca', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $marcavehiculos = MarcaVehiculo::latest()->paginate($perPage);
        }

        return view('marca-vehiculos.index', compact('marcavehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('marca-vehiculos.create');
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
        
        MarcaVehiculo::create($requestData);

        return redirect('marca-vehiculos')->with('flash_message', 'Marca vehiculo creado');
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
        $marcavehiculo = MarcaVehiculo::findOrFail($id);

        return view('marca-vehiculos.show', compact('marcavehiculo'));
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
        $marcavehiculo = MarcaVehiculo::findOrFail($id);

        return view('marca-vehiculos.edit', compact('marcavehiculo'));
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
        
        $marcavehiculo = MarcaVehiculo::findOrFail($id);
        $marcavehiculo->update($requestData);

        return redirect('marca-vehiculos')->with('flash_message', 'Marca vehiculo actualizado');
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
        MarcaVehiculo::destroy($id);

        return redirect('marca-vehiculos')->with('flash_message', 'Marca vehiculo borrado');
    }
}
