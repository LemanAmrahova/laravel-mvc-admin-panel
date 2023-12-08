<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'=> 'required|min:3|max:255',
            'surname'=> 'required|min:3|max:255',
            'email'=>'required|email|max:255',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
            'password'=>'nullable|min:3|max:255',
        ];
    }
}
