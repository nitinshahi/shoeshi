<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if(request()->isMethod('post')){
            return [
                'brand_name' => 'required|string|max:258',
                'brand_description' => 'required|string',
                'brand_image' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
                'brand_url' => 'required|string',
                'brand_meta' => 'required|string'
            ];
        }
        else{
            return [
                'brand_name' => 'required|string|max:258',
                'brand_description' => 'required|string',
                'brand_image' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
                'brand_url' => 'required|string',
                'brand_meta' => 'required|string'
            ];
        }
    }

    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'brand_name.required' => 'Name is Required!!',
                'brand_image.required' => 'image is Required!!',
                'brand_description.required' => 'description is Required!!',
                'brand_url.required' => 'brand_url is Required!!',
                'brand_meta' => 'brand_meta is Required!!',
            ];
        }else{
            return [
                'brand_name.required' => 'Name is Required!!',
                'brand_description.required' => 'description is Required!!',
                'brand_url.required' => 'brand_url is Required!!',
                'brand_meta' => 'brand_meta is Required!!',
            ];
        }

    }
}