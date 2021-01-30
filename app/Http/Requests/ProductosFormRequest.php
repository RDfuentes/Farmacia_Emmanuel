<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */ 
    public function rules()
    {
        return [
            'nombre'=>'required',
            'id_categoria'=>'required',
            'descripcion',
            'codigo'=>'required',
            'id_proveedor'=>'required',
            'costo'=>'required',
            'venta'=>'required',
            'vencimiento'=>'required',
        ];
    }
}
