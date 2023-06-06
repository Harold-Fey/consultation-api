<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'nom' => "required|string",
            'prenoms'=>"required|string",
            'date_de_naissance' => "required|string",
            'numero_de_telephone'=> "required|integer",
            'email'=> "required|email|unique:patients,email",
            'adresse' => "required|string",
        ];
    }
}
