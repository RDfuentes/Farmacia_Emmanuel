<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table='ventas';

    protected $primaryKey='id_venta';

    public $timestamps=false;

    protected $fillable=[
        'id_cliente',
        'id_producto',
        'cantidad',
        'precio',
        'descripcion',
        'condicion'
    ];
}
