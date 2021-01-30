<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Proveedores; 
use App\Http\Requests\ProveedoresFormRequest; 
use Illuminate\Support\Facades\Redirect; 
use DB;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $proveedores=DB::table('proveedores')
            ->where('id_proveedor','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orwhere('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orwhere('direccion','LIKE','%'.$query.'%')
            ->where('condicion','=','1')

            ->orderBy('id_proveedor','desc')
            ->paginate(7);
            return view('proveedores.index',["proveedores"=>$proveedores,"searchText"=>$query]);
        }
    }

 
    public function create()
    { 
        return view("proveedores.create"); 
    }

    public function store(ProveedoresFormRequest $request)
    {      
        $proveedores=new Proveedores;
        $proveedores->nombre=$request->get('nombre');
        $proveedores->direccion=$request->get('direccion');
        $proveedores->correo=$request->get('correo');
        $proveedores->telefono1=$request->get('telefono1');
        $proveedores->telefono2=$request->get('telefono2');
        $proveedores->condicion='1';
        $proveedores->save();
        return Redirect::to('proveedores');
    }


    public function show($id_proveedor) 
    {
        return view("proveedores.show",["proveedores"=>Proveedores::findOrFail($id_proveedor)]);
    }


    public function edit($id_proveedor) 
    {
        return view("proveedores.edit",["proveedores"=>Proveedores::findOrFail($id_proveedor)]);
    }

    public function update(ProveedoresFormRequest $request,$id_proveedor) 
    {   
        $proveedores=Proveedores::findOrFail($id_proveedor); 
        $proveedores->nombre=$request->get('nombre');
        $proveedores->direccion=$request->get('direccion');
        $proveedores->correo=$request->get('correo');
        $proveedores->telefono1=$request->get('telefono1');
        $proveedores->telefono2=$request->get('telefono2');
        $proveedores->update();
        return Redirect::to('proveedores');
    }

    public function destroy($id_proveedor) 
    {
        $proveedores=Proveedores::findOrFail($id_proveedor);
        $proveedores->condicion='0';  
        $proveedores->update();
        return Redirect::to('proveedores');
    }
}
