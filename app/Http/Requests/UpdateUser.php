<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
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
            'id' => 'exists:users,id',
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($this->email, 'email')],
            'phone' => 'required|min:11',
            'avatar' => 'image|mimes:jpg,jpeg',
            'gender' => ['required',
                Rule::in(['male', 'female'])],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'User name is required',
            'email.required' => 'User Email Is required',
            'phone.required' => 'User Phone Is required',
            'avatar.required' => 'User image Is required',
            'gender.required' => 'User Gender Is required',
        ];
    }

}
