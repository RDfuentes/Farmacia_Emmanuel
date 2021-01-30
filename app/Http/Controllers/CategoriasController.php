<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\Categorias; 
use App\Http\Requests\CategoriasFormRequest; 
use Illuminate\Support\Facades\Redirect; 
use DB;

class CategoriasController extends Controller
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
            $categorias=DB::table('categorias')
            ->where('id_categoria','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orwhere('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')

            ->orderBy('id_categoria','desc')
            ->paginate(7);
            return view('categorias.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

 
    public function create()
    { 
        return view("categorias.create"); 
    }

    public function store(CategoriasFormRequest $request)
    {
        $categorias=new Categorias;
        $categorias->nombre=$request->get('nombre');
        $categorias->descripcion=$request->get('descripcion');
        $categorias->condicion='1';
        $categorias->save();
        return Redirect::to('categorias');
    }


    public function show($id_categoria) 
    {
        return view("categorias.show",["categorias"=>Categorias::findOrFail($id_categoria)]);
    }


    public function edit($id_categoria) 
    {
        return view("categorias.edit",["categorias"=>Categorias::findOrFail($id_categoria)]);
    }

    public function update(CategoriasFormRequest $request,$id_categoria) 
    {   
        $categorias=Categorias::findOrFail($id_categoria); 
        $categorias->nombre=$request->get('nombre');
        $categorias->descripcion=$request->get('descripcion');
        $categorias->update();
        return Redirect::to('categorias');
    }

    public function destroy($id_categoria) 
    {
        $categorias=Categorias::findOrFail($id_categoria);
        $categorias->condicion='0';  
        $categorias->update();
        return Redirect::to('categorias');
    }
}
