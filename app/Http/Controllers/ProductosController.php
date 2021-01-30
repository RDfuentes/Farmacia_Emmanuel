<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Productos; 
use App\Http\Requests\ProductosFormRequest; 
use Illuminate\Support\Facades\Redirect; 
use DB;

class ProductosController extends Controller
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
            $productos=DB::table('productos as v')
            ->join('categorias as c', 'v.id_categoria','=','c.id_categoria')
            ->join('proveedores as p', 'v.id_proveedor','=','p.id_proveedor')
            ->select('v.id_producto','v.nombre','v.id_categoria','v.descripcion','v.codigo','v.id_proveedor','v.costo','v.venta','v.vencimiento','v.condicion',
            'c.nombre as categorias','p.nombre as proveedores')
            
            ->where('v.id_producto','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')
            ->orwhere('c.nombre','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')
            ->orwhere('p.nombre','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')
            ->orwhere('v.codigo','LIKE','%'.$query.'%')
            ->where('v.condicion','=','1')

            ->orderBy('v.id_producto','desc')
            ->paginate(7);
            return view('productos.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }

 
    public function create()
    { 
        //agregado 2 lineas
        $productos=DB::table('productos')->where('condicion','=','1')->get();
        $categorias=DB::table('categorias')->where('condicion','=','1')->get();
        $proveedores=DB::table('proveedores')->where('condicion','=','1')->get();
        return view("productos.create",["productos"=>$productos],["categorias"=>$categorias],["proveedores"=>$proveedores]);// retorna a la vista principal que se ha creado en resource
    }

    public function store(ProductosFormRequest $request)
    {
        $productos=new Productos;
        $productos->nombre=$request->get('nombre');
        $productos->id_categoria=$request->get('id_categoria');
        $productos->descripcion=$request->get('descripcion');
        $productos->codigo=$request->get('codigo');
        $productos->id_proveedor=$request->get('id_proveedor');
        $productos->costo=$request->get('costo');
        $productos->venta=$request->get('venta');
        $productos->vencimiento=$request->get('vencimiento');
        $productos->condicion='1';
        $productos->save();
        return Redirect::to('productos');
    }


    public function show($id_producto) 
    {
        return view("productos.show",["productos"=>Productos::findOrFail($id_producto)]);
    }


    public function edit($id_producto) 
    {
        //Agregado 3 lineas
        $productos=Productos::findOrFail($id_producto);
        $categorias=DB::table('categorias')->where('condicion','=','1')->get();
        $proveedores=DB::table('proveedores')->where('condicion','=','1')->get();
        return view("productos.edit",["productos"=>$productos,"categorias"=>$categorias,"proveedores"=>$proveedores]);
    }

    public function update(ProductosFormRequest $request,$id_producto) 
    {   
        $productos=Productos::findOrFail($id_producto); 
        $productos->nombre=$request->get('nombre');
        $productos->id_categoria=$request->get('id_categoria');
        $productos->descripcion=$request->get('descripcion');
        $productos->codigo=$request->get('codigo');
        $productos->id_proveedor=$request->get('id_proveedor');
        $productos->costo=$request->get('costo');
        $productos->venta=$request->get('venta');
        $productos->vencimiento=$request->get('vencimiento');
        $productos->update();
        return Redirect::to('productos');
    }

    public function destroy($id_producto) 
    {
        $productos=Productos::findOrFail($id_producto);
        $productos->condicion='0';  
        $productos->update();
        return Redirect::to('productos');
    }
} 
