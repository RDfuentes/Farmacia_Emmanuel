<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';

    protected $primaryKey='id_producto';

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'id_categoria',
        'descripcion',
        'codigo',
        'id_proveedor',
        'costo',
        'venta',
        'vencimiento',
        'condicion'
    ];
}
