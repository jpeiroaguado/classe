<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class coleccionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|min:3',
            'editorial' => 'required|boolean',
            'usuario_id' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'El nombre es demasiado corto'
            ];
    }
}
