<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $stopOnFirstFailure = true;

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
            'title'         =>   ['required','string','min:2','max:100', Rule::unique('posts', 'title')->ignore($this->route('post'))],
            'excerpt'       =>  'required|string:min:2|max:300',
            'body'          =>  'required|string|min:2|max:1500',
            'thumbnail'     =>  'image',
            'category_id'   =>  'required|exists:categories,id'
        ];
    }
}
