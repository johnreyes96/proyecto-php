<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Modelo;
use App\Empleado;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;


class GestionUsuariosController extends Controller
{

    public function index(Request $request)
    {
        return view('Access.Administracion.GestionUsuarios.index');
    }

    
}
