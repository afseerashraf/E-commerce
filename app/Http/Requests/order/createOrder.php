<?php

namespace App\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class createOrder extends FormRequest
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
            'customer_id' => ['required'],
            'product_id' => ['required'],
            'name' => ['required'],
            'phone' =>['required', 'numeric',  'digits_between:10,12'],
            'address' => ['required'],
        ];
    }
}
