<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'username' => 'required|min:5|max:50',
            'password' => 'required|min:6|max:50',
            'email' => 'required',
            'fullname' => 'required|min:6|max:50',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('user.username_required'),
            'username.max' => trans('user.username_max'),
            'username.min' => trans('user.username_min'),
            'password.required' => trans('user.password_required'),
            'password.max' => trans('user.password_max'),
            'password.min' => trans('user.password_min'),
            'email.required' => trans('user.email_required'),
            'fullname.required' => trans('user.fullname_required'),
            'role.required' => trans('user.role_required'),
        ];
    }
}
