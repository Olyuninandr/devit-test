<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'required|unique:posts|string',
            'link' => 'required|unique:posts|string',
            'description' => 'required|unique:posts|string',
            'pubDate' => 'required|string',
            'guid' => 'required|unique:posts|string',
            'creator' => 'required|string',
        ];
    }
}
