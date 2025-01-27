<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositiuRequest extends FormRequest
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
        $id = $this->route('dispositiu');

        return [
            "nom" => "required|min:6",
            "estat" => "required|in:operatiu,reparació,baixa",
            "ubicacio_id" => "required|exists:ubicacions,id",
        ];
    }

    public function messages(): array
    {
        return [
            "nom.required" => "El nom del dispositiu és obligatori",
            "nom.min" => "El nom ha de tenir al menys 6 caracters",
            "estat.required" => "L'estat del dispositiu és obligatori",
            "estat.in" => "Estat invàlid (operatiu, reparació, baixa)",
            "ubicacio_id.required" => "La ubicació és obligatòria.",
            "ubicacio_id.exists" => "La ubicació seleccionada no és vàlida.",
        ];
    }
}
