<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Ventas; 
use App\Http\Requests\VentasFormRequest; 
use Illuminate\Support\Facades\Redirect; 
use DB;

class VentasController extends Controller
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
            $ventas=DB::table('ventas as v')
            ->join('clientes as c', 'v.id_cliente','=','c.id_cliente')
            ->join('productos as p', 'v.id_producto','=','p.id_producto')
            ->select('v.id_venta','v.id_cliente','v.id_producto','v.cantidad','v.precio','v.descripcion','v.condicion',
            'c.nombre as clientes','c.apellido as clientess','p.nombre as productos','p.codigo as productoss')
            
            ->where('v.id_venta','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')
            ->orwhere('c.nombre','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')
            ->orwhere('p.nombre','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')

            ->orderBy('v.id_venta','desc')
            ->paginate(7);
            return view('ventas.index',["ventas"=>$ventas,"searchText"=>$query]);
        }
    }

 
    public function create()
    { 
        //agregado 2 lineas
        $clientes=DB::table('clientes')->where('condicion','=','1')->get();
        $productos=DB::table('productos')->where('condicion','=','1')->get();
        $ventas=DB::table('ventas')->where('condicion','=','1')->get();
        return view("ventas.create",["clientes"=>$clientes],["productos"=>$productos],["ventas"=>$ventas]);// retorna a la vista principal que se ha creado en resource
    }

    public function store(VentasFormRequest $request)
    {
        $ventas=new Ventas;
        $ventas->id_cliente=$request->get('id_cliente');
        $ventas->id_producto=$request->get('id_producto');
        $ventas->cantidad=$request->get('cantidad');
        $ventas->precio=$request->get('precio');
        $ventas->descripcion=$request->get('descripcion');
        $ventas->condicion='1';
        $ventas->save();
        return Redirect::to('ventas');
    }


    public function show($id_venta) 
    {
        return view("ventas.show",["ventas"=>Ventas::findOrFail($id_venta)]);
    }


    public function edit($id_venta) 
    {
        //Agregado 3 lineas
        $ventas=Ventas::findOrFail($id_venta);
        $clientes=DB::table('clientes')->where('condicion','=','1')->get();
        $productos=DB::table('productos')->where('condicion','=','1')->get();
        return view("ventas.edit",["ventas"=>$ventas,"clientes"=>$clientes,"productos"=>$productos]);
    }

    public function update(VentasFormRequest $request,$id_venta) 
    {   
        $ventas=Ventas::findOrFail($id_venta); 
        $ventas->id_cliente=$request->get('id_cliente');
        $ventas->id_producto=$request->get('id_producto');
        $ventas->cantidad=$request->get('cantidad');
        $ventas->precio=$request->get('precio');
        $ventas->descripcion=$request->get('descripcion');
        $ventas->update();
        return Redirect::to('ventas');
    }

    public function destroy($id_venta) 
    {
        $ventas=Ventas::findOrFail($id_venta);
        $ventas->condicion='0';  
        $ventas->update();
        return Redirect::to('ventas');
    }
} 
