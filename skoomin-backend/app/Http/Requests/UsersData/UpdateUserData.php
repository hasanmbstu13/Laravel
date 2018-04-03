<?php

namespace App\Http\Requests\UsersData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserData extends FormRequest
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
            'email'       => 'required|unique:users,email,' . $this->user_id,
            'phone_no'    => 'required|numeric|unique:users,phone_no,' . $this->user_id,
            'password'    => 'required',
            'first_name'  => 'required|string',
            'last_name'   => 'required|string',
            'middle_name' => 'nullable|string',
            'cnic'        => 'required',
            'gender'      => 'required',
            'picture_url' => 'nullable|url',
            'dob'         => 'required|date'          
        ];
    }
}
