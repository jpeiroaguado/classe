<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class marcadoresRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            'web' => 'required|min:3',
            'descripcion' => 'required|min:20',
            'etiquetas' => 'nullable',
            'usuario_id' => 'required|numeric',
        ];
    }

    public function messages(): array{
        return [
            'web.required' => 'El nombre del marcador obligatorio',
            'web.min' => 'Demasiado corta, no existe tal web',
            'descripción.required' => 'La descripción no puede estar vacia',
            'descripcion.required' => 'Descripción demasiado cotra, escribe al menos 20 palabras',
            'coleccion_id.required' => 'El marcador debe estar asociado a una colección',
            'coleccion_id.numeric' => 'El marcador debe estar asociado a una colección'
            ];
    }
}
