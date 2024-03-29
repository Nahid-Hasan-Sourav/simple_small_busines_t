<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuyProductRequest extends FormRequest
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
            'product_id'        =>'required',
            'supplier_id'       =>'required',
            'quantity'          =>'required',
            'unit_price'        =>'required'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required'         =>'Product name field is required.',
            'supplier_id.required'        =>'Supplier name field is required.',
            'quantity.required'           => 'Product quantity is required.',
            'unit_price.required'         => 'Product unit price is required.',
           
           
        ];
    }
}
