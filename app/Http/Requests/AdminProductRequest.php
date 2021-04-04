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
        $is_edit = $this->request->get('is_edit');
        if (isset($is_edit)) {
            return [
                'name' => 'required|unique:products,name,'.$id.',id',
                'category_id' => 'required',
                'price' => 'required|numeric',
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
                'title' => 'required',
                'time_of_launch' => 'required',
                'slug' => 'required|unique:products,slug,'.$id.',id',
                'description' => 'required',
                'content' => 'required',
            ];
        }
        return [
            'name' => 'required|unique:products',
            'category_id' => 'required',
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
            'title' => 'required',
            'time_of_launch' => 'required',
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
            'name.required' => "Name is required",
            'name.unique' => "Name is unique",
            'category_id.required' => 'category is required',
            'price.required' => 'price is required',
            'price.numeric' => 'price is numeric',
            'brand_id.required' => 'brand is required',
            'operator_id.required' => 'operator is required',
            'camera_after_id.required' => 'camera_after is required',
            'camera_before_id.required' => 'camera_before is required',
            'cpu_id.required' => 'cpu is required',
            'ram_id.required' => 'ram is required',
            'memory_id.required' => 'memory is required',
            'sim_id.required' => 'sim is required',
            'pin_id.required' => 'pin is required',
            'display_id.required' => 'display  is required',
            'title.required' => 'title is required',
            'time_of_launch.required' => 'time-of-launch is required',
            'slug' => 'Slug is unique',
//            'type.required' => 'type is required',
            'description.required' => 'description is required',
            'content.required' => 'content is required',
        ];
    }
}
