<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarrierProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "image" => 'mimes:jpeg,jpg,png,gif|max:2048|nullable',
            'bio' => 'string|max:4096|nullable',
            'contact' => 'string|max:255|email|nullable',
        ];
    }
}
