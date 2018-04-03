<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'profile_url.*'     => 'nullable|url',
            'first_name.*'      => 'required|string',
            'last_name.*'       => 'required|string',
            'middle_name.*'     => 'nullable|string',
            'email.*'           => 'required|email|unique:users,email',
            'phone_no.*'        => 'required|numeric|unique:users,phone_no',
            'cnic.*'            => 'required',
            'gender.*'          => 'required|numeric',
            'date_of_birth.*'   => 'required|date',
            'class_id'          => 'required|numeric',
            'parent_id'         => 'required|numeric',
            'address'           => 'required|string',
            'tenant_id'         => 'required'
        ];
    }
}
