<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'       =>'required|unique:products',
            'quantity'   =>'required',
            'unit_price' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Product name field is required.',
            'name.unique'          => 'Product name will be unique.',
            'quantity.required'    => 'Product quantity is required.',
            'unit_price.required'  => 'Product unit price is required.',
           
           
        ];
    }
}
