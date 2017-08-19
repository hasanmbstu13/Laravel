<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\CoreRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends CoreRequest
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
            'heading' => 'required',
            'due_date' => 'required',
            'user_id' => 'required',
            'project_id' => 'required',
            'priority' => 'required'
        ];
    }

    public function messages() {
        return [
          'project_id.required' => 'Choose a project',
          'user_id.required' => 'Choose an assignee'
        ];
    }
}
