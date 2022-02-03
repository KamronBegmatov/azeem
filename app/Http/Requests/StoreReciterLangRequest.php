<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReciterLangRequest extends FormRequest
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
            'name' => 'required|string',
            'info' => 'required|min:3|max:1000',
            'style_id' => 'required|exists:styles,id',
            'reciter_id' => 'required|exists:reciters,id',
            'language_id' => 'required|exists:languages,id'
        ];
    }
}
