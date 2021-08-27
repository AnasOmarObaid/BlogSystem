<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         =>  'required|string|min:2|max:100|unique:posts,title',
            'excerpt'       =>  'required|string:min:2|max:300',
            'body'          =>  'required|string|min:2|max:300',
            'thumbnail'     =>  'required|image',
            'category_id'   =>  'required|exists:categories,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'this title can not be empty',
        ];
    }
}
