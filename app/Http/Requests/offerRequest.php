<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
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
            'name'=>'required |max 100|unique:offers,name',
            'price'=>'required | numeric',
            'details'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__("messages.offer name"),
            'price.numeric'=>__("messages.price"),
        ]; // TODO: Change the autogenerated stub
    }
}
