<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelo;
use App\Empleado;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Access.home');
    }
    public function denied()
    {
        return view('auth.denied');
    }

    public function getHistoryRegistroTiemposModelo(Request $request)
    {   
        // Obtener el código del modelo    
        if ($request->session()->has('InfoUsuario')) 
        {
            if ($request->session()->has('typeUser') == "Modelo") 
            {
                foreach ($request->session()->get('InfoUsuario') as $info) 
                {
                    $idModelo = $info->ModeloId;    
                }

                $RegistrosTiempos = DB::select('CALL sp_historyRegistroTiemposModelo(?)', array($idModelo));

                return response()->json(['Contenido' => $RegistrosTiempos]);
            }    
        }   
    }
}
