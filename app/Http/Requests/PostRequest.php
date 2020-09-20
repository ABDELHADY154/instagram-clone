<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class PostRequest extends FormRequest
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
        Validator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });
        return [
            // 'user_id' => ['required', 'exists:users,id', 'numeric'],
            'image' => ['image', 'mimes:png,jpg,jpeg'],
            'caption' => ['required', 'string'],
            'like_no' => ['numeric'],
            'comment_no' => ['numeric'],
            'tags' => ['required', 'regex:/#+([a-zA-Z0-9_]+)/', 'without_spaces']
        ];
    }

    public function messages()
    {
        return [
            'tags.regex' => 'the tag must include # ',
            'tags.without_spaces' => 'the tag must not contain spaces'
        ];
    }
}
