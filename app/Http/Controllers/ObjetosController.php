<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetosController extends Controller
{
    public function obtenerObjetosRol(Request $request)
    {
    	return response()->json(['Request' => $request->session()->get('ControlObject')]);
    	/*if ($request->session()->has('ControlObject')) {
    		return $request->session()->get('ControlObject');
		}else{

			// Consultar objetos
			$objetosPerfiles = array('HolaMundo', 'HolaMundo2');
			$request->session()->put('ControlObject', $objetosPerfiles);

			return $request->session()->get('ControlObject');
		}*/
		/*
	@foreach (Session::get('ControlObject') as $key)
                                            {{ $key }}
                                        @endforeach
		*/
    }
}
