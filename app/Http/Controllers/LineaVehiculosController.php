<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\LineaVehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineaVehiculosController extends Controller
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
            $lineavehiculos = LineaVehiculo::where('LineaVehiculo', 'LIKE', "%$keyword%")
                ->orWhere('IdMarca', 'LIKE', "%$keyword%")
                ->join('marca_vehiculos', 'linea_vehiculos.IdMarca', '=', 'marca_vehiculos.id')
                ->select('linea_vehiculos.LineaVehiculo', 'linea_vehiculos.id as idLinea', 'marca_vehiculos.Marca')
                ->latest('linea_vehiculos.created_at')->paginate($perPage);
        } else {
            $lineavehiculos = LineaVehiculo::join('marca_vehiculos', 'linea_vehiculos.IdMarca', '=', 'marca_vehiculos.id')
            ->select('linea_vehiculos.LineaVehiculo', 'linea_vehiculos.id as idLinea', 'marca_vehiculos.Marca')
            ->latest('linea_vehiculos.created_at')->paginate($perPage);
        }

        return view('linea-vehiculos.index', compact('lineavehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $marcas = DB::select('CALL getAllMarcas()');
        return view('linea-vehiculos.create', compact('marcas'));
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
        
        LineaVehiculo::create($requestData);

        return redirect('linea-vehiculos')->with('flash_message', 'Linea vehículo creado');
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
        $lineavehiculo = LineaVehiculo::join('marca_vehiculos', 'linea_vehiculos.IdMarca', '=', 'marca_vehiculos.id')
        ->select('linea_vehiculos.LineaVehiculo', 'linea_vehiculos.id as idLinea', 'marca_vehiculos.Marca')
            ->findOrFail($id);

        return view('linea-vehiculos.show', compact('lineavehiculo'));
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
        $lineavehiculo = LineaVehiculo::findOrFail($id);
        $marcas = DB::select('CALL getAllMarcas()');

        return view('linea-vehiculos.edit', compact('lineavehiculo', 'marcas'));
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
        
        $lineavehiculo = LineaVehiculo::findOrFail($id);
        $lineavehiculo->update($requestData);

        return redirect('linea-vehiculos')->with('flash_message', 'Linea vehículo actualizado');
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
        LineaVehiculo::destroy($id);

        return redirect('linea-vehiculos')->with('flash_message', 'Linea vehículo borrado');
    }
}
