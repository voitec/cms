<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required|max:255|unique:posts',
            'preview' => 'required',
            'content' => 'required',
            'type' => 'required|in:blog,portfolio',
            'status' => 'required|in:public,private',
            'user_id' => 'integer|required',
            'category_id' => 'integer|required',
            'image' => 'image'
        ];
    }
}
