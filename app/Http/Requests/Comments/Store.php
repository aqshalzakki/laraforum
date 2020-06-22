<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function authorize()
    {
        return 1;
    }

    public function rules()
    {
        return [
            'body' => 'required',
        ];
    }
}
