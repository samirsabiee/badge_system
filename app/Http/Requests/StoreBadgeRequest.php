<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBadgeRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'required_number' => ['required', 'numeric'],
            'icon_url' => ['required', 'string'],
            'type' => ['required', 'digits:1', 'digits_between:0,2'],
            'description' => ['required', 'string'],

        ];
    }
}
