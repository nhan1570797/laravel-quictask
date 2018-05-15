<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|min:8|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('messages.name_required'),
            'name.max' => trans('user.username_max'),
            'name.min' => trans('user.username_min'),
        ];
    }
}
