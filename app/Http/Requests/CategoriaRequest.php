<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'nombre' => 'required|unique:categorias'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el nombre de la categoria',
            'nombre.unique' => 'La categoria ingresada ya existe'
        ];
    }


}
