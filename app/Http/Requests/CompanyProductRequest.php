<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class CompanyProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create', Product::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'string', 'max:40'],
            'price' => ['required','numeric','digits_between:1,5'],
            'image' => ['required', 'mimes:jpg,jpeg,png,webp'],
        ];
    }
}
