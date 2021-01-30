<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesFormRequest extends FormRequest
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
            'apellido'=>'required',
            'direccion'=>'required',
            'telefono1'=>'required|max:8',
            'telefono2'=>'max:8',
        ];
    }
}
