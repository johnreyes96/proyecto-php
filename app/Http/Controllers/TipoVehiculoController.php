<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
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
            $tipovehiculo = TipoVehiculo::where('TipoVehiculo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tipovehiculo = TipoVehiculo::latest()->paginate($perPage);
        }

        return view('tipo-vehiculo.index', compact('tipovehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-vehiculo.create');
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
        
        TipoVehiculo::create($requestData);

        return redirect('tipo-vehiculo')->with('flash_message', 'Tipo vehículo creado');
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
        $tipovehiculo = TipoVehiculo::findOrFail($id);

        return view('tipo-vehiculo.show', compact('tipovehiculo'));
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
        $tipovehiculo = TipoVehiculo::findOrFail($id);

        return view('tipo-vehiculo.edit', compact('tipovehiculo'));
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
        
        $tipovehiculo = TipoVehiculo::findOrFail($id);
        $tipovehiculo->update($requestData);

        return redirect('tipo-vehiculo')->with('flash_message', 'Tipo vehículo actualizado');
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
        TipoVehiculo::destroy($id);

        return redirect('tipo-vehiculo')->with('flash_message', 'Tipo vehículo borrado');
    }
}
