<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\ColorVehiculo;
use Illuminate\Http\Request;

class ColorVehiculosController extends Controller
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
            $colorvehiculos = ColorVehiculo::where('Color', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $colorvehiculos = ColorVehiculo::latest()->paginate($perPage);
        }

        return view('color-vehiculos.index', compact('colorvehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('color-vehiculos.create');
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
        
        ColorVehiculo::create($requestData);

        return redirect('color-vehiculos')->with('flash_message', 'Color vehículo creado');
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
        $colorvehiculo = ColorVehiculo::findOrFail($id);

        return view('color-vehiculos.show', compact('colorvehiculo'));
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
        $colorvehiculo = ColorVehiculo::findOrFail($id);

        return view('color-vehiculos.edit', compact('colorvehiculo'));
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
        
        $colorvehiculo = ColorVehiculo::findOrFail($id);
        $colorvehiculo->update($requestData);

        return redirect('color-vehiculos')->with('flash_message', 'Color vehículo actualizado');
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
        ColorVehiculo::destroy($id);

        return redirect('color-vehiculos')->with('flash_message', 'Color vehículo borrado');
    }
}
