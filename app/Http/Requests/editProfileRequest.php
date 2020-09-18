<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class editProfileRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'user_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'website' => ['nullable', 'string'],
            'phone_number' => ['required', 'integer'],
            'gender' => ['required', 'string', 'max:6'],
            'bio' => ['nullable', 'string', 'max:200'],
            'avatar' =>  ['image', 'mimes:png,jpg,jpeg']
        ];
    }
}
