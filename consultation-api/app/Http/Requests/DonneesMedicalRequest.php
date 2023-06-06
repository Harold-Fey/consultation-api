<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonneesMedicalRequest extends FormRequest
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
            "sexe" => "required|integer",
            "hypertension" =>  "required|integer",
            "probleme_cardiaque" => "required|integer",
            "bmi" =>  "required|integer",
            "glucose" =>  "required|integer",
            "fumeur" => "required|integer",
            "hbaic" => "required|integer",
            "patient_id" => "required|exists:patients,id"
        ];
    }
}
