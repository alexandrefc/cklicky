<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateVenue extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'logo' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A Company Name is required',
            'title.unique' => 'This title already exists, please try other',
            'content.required' => 'A message is required',
            'content.unique' => 'This content already exists, please try other',
        ];
    }
}
