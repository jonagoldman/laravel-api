<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchGifRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'query' => ['required', 'string', 'max:50'],
            'limit' => ['numeric', 'max:50'],
            'offset' => ['numeric', 'max:4999'],
        ];
    }
}
