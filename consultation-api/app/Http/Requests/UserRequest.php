<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => "required|email|unique:users,email",
            'nom' => "required|string",
            'prenom' => "required|string",
            'poste' => "required|string",
            'sexe' => "required",
            'N°_de_license' => "required",
            'mot_de_passe' => "required",

        ];
    }
}
