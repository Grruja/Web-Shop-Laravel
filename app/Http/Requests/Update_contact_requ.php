<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update_contact_requ extends FormRequest
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
        $contact_id = $this->request->get('id');

        return [
            'email' => 'required|string|email|unique:contact,email,'.$contact_id,
            'subject' => 'required|string',
        ];
    }
}
