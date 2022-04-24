<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorevehiculosRequest extends FormRequest
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
            'placa' => 'required | max:16', 
            'descripcion' => 'required | max:100', 
            'tipo' => 'required | max:16'
        ];
    }
}
