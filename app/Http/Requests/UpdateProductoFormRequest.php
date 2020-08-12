<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductoFormRequest extends FormRequest
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
            'descripcion' => 'required|max:5000',
            'observacion' => 'max:5000',
            'precioMinorista' => 'nullable|numeric',
            'precioMayorista' => 'nullable|numeric',
            'precioBlister' => 'nullable|numeric',
            'cantidadBlister' => 'nullable|numeric|min:1'
        ];
    }
}
