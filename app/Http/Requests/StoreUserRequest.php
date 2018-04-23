<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'national_id'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'creator' => 'exists:users,id',
            'avatar_image' => 'mimes:jpeg,jpg',
            ];
    }
}
