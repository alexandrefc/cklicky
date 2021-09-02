<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreateCoupon extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg, png, jpeg|max:5048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.unique' => 'This title already exists, please try other',
            'content.required' => 'A message is required',
            'content.unique' => 'This content already exists, please try other',
        ];
    }
}