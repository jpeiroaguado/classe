<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'titulo'=>'required',
            'precio'=>'required|numeric|min:0'
        ];
    }
    public function messages(): array
    {
        return [
            'titulo.required'=>'El titulo es obligatorio',
            'precio.required'=> 'El precio es obligatorio',
            'precio.numeric'=> 'El precio debe ser un valor numérico',
            'precio.min'=> 'El precio ha de ser mayor de 0'
        ];
    }
}
