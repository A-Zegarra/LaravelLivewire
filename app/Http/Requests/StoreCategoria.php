<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoria extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre de categoría',
        ];
    }
    public function messages()
    {
        return [
            'descripcion.required' => 'Debe ingresar una descripcion para categoría'
        ];
    }
}
