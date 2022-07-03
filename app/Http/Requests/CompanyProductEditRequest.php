<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class CompanyProductEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('edit', Product::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:100', 'nullable','unique:products,name'],
            'desc' => ['string', 'max:255', 'nullable'],
            'quantity' => ['string', 'max:40', 'nullable'],
            'price' => [,'numeric','digits_between:1,5', 'nullable'],
            'category' => ['integer', 'exists:categories,id', 'nullable'],
            'image' => ['mimes:jpg,jpeg,png,webp','max:2048','dimensions:ratio=1/1'],
        ];
    }
}
