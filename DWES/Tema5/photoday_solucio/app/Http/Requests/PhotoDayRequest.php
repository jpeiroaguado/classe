<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoDayRequest extends FormRequest
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
            'titulo' => 'required|min:5',
            'descripcion' => 'required|min:5',
            'imagen' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'Título requerido',
            'titulo.min' => 'Longitud mínima de 5 caracteres',
            'descripcion.required' => 'Descripción requerida',
            'descripcion.min' => 'Longitud mínima de 5 caracteres',
            'imagen.required' => 'Imagen requerida',
            'imagen.mimes' => 'Extensión no válida',
            'imagen.image' => 'No es una imagen',
            'imagen.max' => 'Imagen demasiado grande'
        ];
    }
}
