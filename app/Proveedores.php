<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table='proveedores';

    protected $primaryKey='id_proveedor';

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'direccion',
        'correo',
        'telefono1',
        'telefono2',
        'condicion'
    ];
}
