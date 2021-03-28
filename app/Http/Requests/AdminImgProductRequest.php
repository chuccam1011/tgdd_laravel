<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminImgProductRequest extends FormRequest
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
                'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
        return [
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
            'img.required' => 'Image is required',
            'img.image' => 'Image is image',
            'img.mimes' => 'Image extension must be jpeg,png,jpg,gif,svg',
            'img.max' => 'Maximum of size is 2048kb',
        ];
    }
}
