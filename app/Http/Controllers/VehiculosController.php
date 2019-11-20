<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
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
            $vehiculos = Vehiculo::where('Placa', 'LIKE', "%$keyword%")
                ->orWhere('IdTipoVehiculo', 'LIKE', "%$keyword%")
                ->orWhere('IdMarca', 'LIKE', "%$keyword%")
                ->orWhere('IdModelo', 'LIKE', "%$keyword%")
                ->orWhere('IdColor', 'LIKE', "%$keyword%")
                ->orWhere('LicenciaTransito', 'LIKE', "%$keyword%")
                ->orWhere('IdCiudadLicencia', 'LIKE', "%$keyword%")
                ->orWhere('IdUsuario', 'LIKE', "%$keyword%")
                ->orWhere('IdModalidadServicio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $vehiculos = Vehiculo::latest()->paginate($perPage);
        }

        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vehiculos.create');
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
        
        Vehiculo::create($requestData);

        return redirect('vehiculos')->with('flash_message', 'Vehículo creado');
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
        $vehiculo = Vehiculo::findOrFail($id);

        return view('vehiculos.show', compact('vehiculo'));
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
        $vehiculo = Vehiculo::findOrFail($id);

        return view('vehiculos.edit', compact('vehiculo'));
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
        
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($requestData);

        return redirect('vehiculos')->with('flash_message', 'Vehículo actualizado');
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
        Vehiculo::destroy($id);

        return redirect('vehiculos')->with('flash_message', 'Vehículo borrado');
    }
}
