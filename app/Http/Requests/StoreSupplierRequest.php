<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required',
            'email'         => 'required',
            'phoneNumber'   => 'required', 
            'address'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'The name field is required.',
            'email.required'       => 'The email field is required.',
            'phoneNumber.required' => 'The phone number field is required.',
            'address.required'     => 'The address field is required.',
           
           
        ];
    }
}
