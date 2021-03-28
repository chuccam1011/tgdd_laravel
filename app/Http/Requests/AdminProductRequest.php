<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
                'name' => 'required',
                'catalog_id' => 'required',
                'price' => 'required',
                'brand_id' => 'required',
                'operator_id' => 'required',
                'camera_after_id' => 'required',
                'camera_before_id' => 'required',
                'cpu_id' => 'required',
                'ram_id' => 'required',
                'memory_id' => 'required',
                'sim_id' => 'required',
                'pin_id' => 'required',
                'display_id' => 'required',
                'feature' => 'required',
                'title' => 'required',
                'time-of-launch' => 'required',
                'slug' => 'required',
                'type' => 'required',
                'rate' => 'required',
                'description' => 'required',
                'content' => 'required',
            ];
        }
        return [
            'name' => 'required',
            'catalog_id' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'operator_id' => 'required',
            'camera_after_id' => 'required',
            'camera_before_id' => 'required',
            'cpu_id' => 'required',
            'ram_id' => 'required',
            'memory_id' => 'required',
            'sim_id' => 'required',
            'pin_id' => 'required',
            'display_id' => 'required',
            'feature' => 'required',
            'title' => 'required',
            'time-of-launch' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'rate' => 'required',
            'description' => 'required',
            'content' => 'required',
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
        ];
    }
}
