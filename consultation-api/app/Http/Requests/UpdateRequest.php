<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom' => "required|string",
            'prenom' => "required|string",
            'poste' => "required|string",
            'sexe' => "required",
            'N°_de_license' => "required",
            'mot_de_passe' => "required",
        ];
    }
}
