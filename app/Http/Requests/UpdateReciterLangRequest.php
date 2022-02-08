<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReciterLangRequest extends FormRequest
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
            'name' => 'string',
            'info' => 'min:3|max:1000',
            'style_id' => 'exists:styles,id',
            'reciter_id' => 'exists:reciters,id',
            'language_id' => 'exists:languages,id'
        ];
    }
}
