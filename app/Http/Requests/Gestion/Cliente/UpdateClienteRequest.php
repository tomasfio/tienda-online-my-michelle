<?php

namespace App\Http\Requests\Gestion\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'nullable|numeric',
            'prefijo' => 'required|numeric',
            'numTel' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el nombre del cliente',
            'apellido.required' => 'Debe ingresar el apellido del cliente',
            'documento.numeric' => 'El dni ingresado tiene que ser un numero',
            'prefijo.required' => 'Debe ingresar el prefijo del numero de celular',
            'prefijo.numeric' => 'El prefijo tiene que ser un numero',
            'numTel.required' => 'Debe ingresar el numero de celular',
            'numTel.numeric' => 'El numero tiene que ser un numero'
        ];
    }
}
