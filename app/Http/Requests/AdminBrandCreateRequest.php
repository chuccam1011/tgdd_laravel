<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBrandCreateRequest extends FormRequest
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
        $id = $this->request->get('id');
        if (isset($id)) {
            return [
                'name' => 'required|unique:brands,id,{$id}',
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
        return [
            'name' => 'required|unique:brands',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'name.required' => 'A name is required',
            'name.unique' => 'A name is unique',
            'logo.required' => 'Logo is required',
            'logo.image' => 'Logo is image',
            'logo.mimes' => 'Logo extension must be jpeg,png,jpg,gif,svg',
            'logo.max' => 'Maximum of size is 2048kb',
        ];
    }
}
