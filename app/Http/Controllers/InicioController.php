<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // FUNCION MOSTRAR INDEX
    public function index(Request $request) // cargar un objeto, principal
    {
        return view("inicio.index");
    }

    //FUNCION MOSTRAR VISTAS
    public function show()
    {
        return view("inicio.show");
    }
}
