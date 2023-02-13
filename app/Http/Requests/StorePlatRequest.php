<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlatRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|max:200',
            'description' => 'bail|required|max:500',
            'image' => 'sometimes|bail|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
