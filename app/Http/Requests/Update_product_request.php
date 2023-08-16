<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_product_request extends FormRequest
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
            'name' => 'required|string|min:2',
            'description' => 'required|string|max:255',
            'amount' => 'required|int|min:0',
            'price' => 'required|numeric|gt:0|between:0,99.99',
            'image' => 'required|string',
        ];
    }
}
