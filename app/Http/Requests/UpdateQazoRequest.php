<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQazoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'madhab' => 'required|string',
            'gender' => 'required|boolean',
            'birth_date' => 'required|date',
            'adolescence_age' => 'required|numeric',
            'age_started_namaz' => 'required|numeric',
            'number_of_children' => 'numeric',
            'regular_nifos_days' => 'numeric',
            'regular_hayz_days' => 'numeric'
        ];
    }
}
