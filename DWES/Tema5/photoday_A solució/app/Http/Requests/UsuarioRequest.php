<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nombre' => 'required|min:4',
            'email' => 'required|unique:usuarios,email|email:rfc',
            'password' => 'required|min:6|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'Título requerido',
            'nombre.min' => 'Longitud mínima de 5 caracteres',
            'email.required' => 'Email requerido',
            'email.email' => 'Email inválido',
            'email.unique' => 'Email ya existe',
            'password.required' => 'Password requerido',
            'password.min' => 'Longitud mínima de 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ];
    }
}
