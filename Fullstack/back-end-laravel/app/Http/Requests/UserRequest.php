<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "id" => 'required',
            'Firstname' => 'required',
            'Lastname' => 'required',
            'Phone' => 'required',
            'password' => 'required',
            'email' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id.reuired' => 'Please add your id.',
            'Firstname.required' => 'Please add your first name.',
            'Lastname.reuired' => 'Please add your last name.',
            'Phone.required' => 'Please add your phone number.',
            'password.reuired' => 'Please add your password.',
            'email.required' => 'Please add your email.',
        ];
    }
}