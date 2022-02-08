<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuraReciterRequest extends FormRequest
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
            'reciter_id' => 'required|exists:reciters,id',
            'sura' => 'required|exists:suras,sura',
            'ayah' => 'required|exists:suras,ayah',
            'audio' => 'required|file'
        ];
    }
}
