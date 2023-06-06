<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PredictionRequest extends FormRequest
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
            'probabilite_positive' => "required|decimal:1",
            'probabilite_negative'=> "required|decimal:1",
            'resultat_prediction'=> "required|string",
            'valide'=> "required|boolean",
            'donnees_id'=> "required|exists:donnees_medicals,id"
        ];
    }
}
