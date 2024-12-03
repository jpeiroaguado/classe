<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPost extends FormRequest
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
    public function rules(): array{
        return [
           'titulo'=> 'required|min:5',
           'contenido'=> 'required|min:30'
        ];
    }
    public function messages(): array{
        return[
            'titulo.required'=>'Titulo Obligatorio',
            'titulo.min'=>'Titulo con al menos 5 caracteres',
            'contenido.required'=>'Contenido Obligatorio',
            'contenido.min'=>'El contenido tiene que tener al menos 30 caracteres'
        ];
    }
}
