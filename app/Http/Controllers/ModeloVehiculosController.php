<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ModeloVehiculo;
use Illuminate\Http\Request;

class ModeloVehiculosController extends Controller
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
            $modelovehiculos = ModeloVehiculo::where('Modelo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $modelovehiculos = ModeloVehiculo::latest()->paginate($perPage);
        }

        return view('modelo-vehiculos.index', compact('modelovehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('modelo-vehiculos.create');
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
        
        ModeloVehiculo::create($requestData);

        return redirect('modelo-vehiculos')->with('flash_message', 'Modelo vehículo creado');
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
        $modelovehiculo = ModeloVehiculo::findOrFail($id);

        return view('modelo-vehiculos.show', compact('modelovehiculo'));
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
        $modelovehiculo = ModeloVehiculo::findOrFail($id);

        return view('modelo-vehiculos.edit', compact('modelovehiculo'));
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
        
        $modelovehiculo = ModeloVehiculo::findOrFail($id);
        $modelovehiculo->update($requestData);

        return redirect('modelo-vehiculos')->with('flash_message', 'Modelo vehículo actualizado');
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
        ModeloVehiculo::destroy($id);

        return redirect('modelo-vehiculos')->with('flash_message', 'Modelo vehículo borrado');
    }
}
