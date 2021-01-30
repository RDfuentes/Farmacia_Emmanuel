<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Clientes; 
use App\Http\Requests\ClientesFormRequest; 
use Illuminate\Support\Facades\Redirect; 
use DB;

class ClientesController extends Controller
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
            $clientes=DB::table('clientes')
            ->where('id_cliente','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orwhere('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orwhere('apellido','LIKE','%'.$query.'%')
            ->where('condicion','=','1')

            ->orderBy('id_cliente','desc')
            ->paginate(7);
            return view('clientes.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }

 
    public function create()
    { 
        return view("clientes.create"); 
    }

    public function store(ClientesFormRequest $request)
    {      
        $clientes=new Clientes;
        $clientes->nombre=$request->get('nombre');
        $clientes->apellido=$request->get('apellido');
        $clientes->direccion=$request->get('direccion');
        $clientes->telefono1=$request->get('telefono1');
        $clientes->telefono2=$request->get('telefono2');
        $clientes->condicion='1';
        $clientes->save();
        return Redirect::to('clientes');
    }


    public function show($id_cliente) 
    {
        return view("clientes.show",["clientes"=>Clientes::findOrFail($id_categoria)]);
    }


    public function edit($id_cliente) 
    {
        return view("clientes.edit",["clientes"=>Clientes::findOrFail($id_cliente)]);
    }

    public function update(ClientesFormRequest $request,$id_cliente) 
    {   
        $clientes=Clientes::findOrFail($id_cliente); 
        $clientes->nombre=$request->get('nombre');
        $clientes->apellido=$request->get('apellido');
        $clientes->direccion=$request->get('direccion');
        $clientes->telefono1=$request->get('telefono1');
        $clientes->telefono2=$request->get('telefono2');
        $clientes->update();
        return Redirect::to('clientes');
    }

    public function destroy($id_cliente) 
    {
        $clientes=Clientes::findOrFail($id_cliente);
        $clientes->condicion='0';  
        $clientes->update();
        return Redirect::to('clientes');
    }
}
