<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
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
        if(request()->isMethod('post')){
            return [
                'category_name' => 'required|string|max:258',
                'category_description' => 'nullable|string',
                'category_image' => 'nullable|image|mimes:jpg,png,jpeg,svg,gif|max:2048',
                'category_url' => 'required|string',
                'category_meta' => 'required|string'
            ];
        }
    }
    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'category_name.required' => 'Name is Required!!',
                'category_url.required' => 'category_url is Required!!',
                'category_meta' => 'category_meta is Required!!',
            ];
        }

    }
}
