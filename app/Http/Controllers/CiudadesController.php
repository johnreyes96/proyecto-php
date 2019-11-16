<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Ciudades;
use Illuminate\Http\Request;

class CiudadesController extends Controller
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
            $ciudades = Ciudades::where('NombreCiudad', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ciudades = Ciudades::latest()->paginate($perPage);
        }

        return view('ciudades.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ciudades.create');
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
        
        Ciudades::create($requestData);

        return redirect('ciudades')->with('flash_message', 'Ciudad creada');
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
        $ciudade = Ciudades::findOrFail($id);

        return view('ciudades.show', compact('ciudade'));
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
        $ciudade = Ciudades::findOrFail($id);

        return view('ciudades.edit', compact('ciudade'));
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
        
        $ciudade = Ciudades::findOrFail($id);
        $ciudade->update($requestData);

        return redirect('ciudades')->with('flash_message', 'Ciudade actualizada');
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
        Ciudades::destroy($id);

        return redirect('ciudades')->with('flash_message', 'Ciudade eliminada');
    }
}
