<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u|unique:categories,name',
            'description' => 'nullable|string|max:500',  
            'parent_id' => 'nullable|exists:categories,id',  
            'status' => 'nullable|boolean',          
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',           
        ];
    }

    public function messages()
    {
        return [         
            'name.required' => trans('validation.required'),
            'name.regex' => trans('validation.regex'),
            'name.max' => trans('validation.max'),
            'description.string' => trans('validation.string'),
            'description.max' => trans('validation.max'),
            'parent_id.exists' => trans('validation.exists'),
            'status.boolean' => trans('validation.boolean'),           
        ];
    }
}
