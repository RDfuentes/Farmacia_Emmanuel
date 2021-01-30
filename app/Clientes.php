<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table='clientes';

    protected $primaryKey='id_cliente';

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'apellido',
        'direccion',
        'telefono1',
        'telefono2',
        'condicion'
    ];
}
