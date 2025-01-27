<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class dispositivoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'estat' => 'required|in:operatiu,reparació,baixa',
        ];
    }
    public function messages(): array
    {
        return [
            'estat.required' => 'El estado es obligatorio',
            'estat.in' => 'Los estados poden ser operatiu, reparacio o baixa',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
}
