<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataEntry extends FormRequest
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
            'phone_no' => 'required|numeric|unique:businesses,landline|digits:10',
            'email'     => 'nullable|email',
            'fax_no' => 'nullable|numeric',
            'price'  => 'nullable|numeric',
            'post_code'  => 'nullable|numeric',
            'other_state' => 'nullable|string',     
            'other_city' => 'nullable|string',     
            'other_suburb' => 'nullable|string',     
        ];
    }
}
