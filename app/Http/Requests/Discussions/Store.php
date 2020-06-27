<?php

namespace App\Http\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'unique:discussions', 'max:100'],
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ];
    }
    
    public function messages()
    {
        return [
            'category_id.exists' => 'The selected category is invalid.'
        ];
    }
}
