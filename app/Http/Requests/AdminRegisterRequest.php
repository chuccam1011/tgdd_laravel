<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'gender' => 'numeric|in:0,1,2,3',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'A Username is required',
            'name.unique' => 'A Username is unique',
            'email.required' => 'A Email is required',
            'email.unique' => 'Email is unique',
            'email.email' => 'A Email is have not format',
            'password.required' => 'A password is required',
            'password.min' => 'Min leght of password is 6',
            'gender.numeric' => 'Gender is not true',
            'gender.in' => 'Gender is not true',
            'password_confirmation.password' => 'Confirm password is not match',
        ];
    }
}
