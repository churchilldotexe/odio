<?php

namespace App\Http\Requests;

use App\Enums\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckoutPostRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:10'],
            'address' => ['required', 'min:4'],
            'zipCode' => ['required', 'integer', 'min:4'],
            'city' => ['required', 'min:3'],
            'country' => ['required', 'min:3'],
            'paymentMethod' => ['required', Rule::enum(PaymentMethod::class)],
            'eNumber' => [Rule::requiredIf(fn () => $this->paymentMethod === PaymentMethod::EMONEY->value), 'min:2'],
            'ePin' => [Rule::requiredIf(fn () => $this->paymentMethod === PaymentMethod::EMONEY->value), 'min:2'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute is required',
            'email' => 'Wrong Format ',
            'min' => ' must be at least :min',
            'max' => ' exceeds :max length',
        ];
    }
}
