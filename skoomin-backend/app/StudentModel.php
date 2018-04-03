<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class StudentModel extends Model
{
    use BelongsToTenants;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_url',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_no',
        'cnic',
        'gender',
        'date_of_birth',
        'class_id',
        'parent_id',
        'address',
        'tenant_id'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static $createRules  = [
            'profile_url'     => 'nullable|url',
            'first_name'      => 'required|string',
            'middle_name'     => 'required|string',
            'last_name'       => 'required|string',
            'middle_name'     => 'nullable|string',
            'email'           => 'required|email|unique:students,email',
            'phone_no'        => 'required|numeric|unique:students,phone_no',
            'cnic'            => 'required',
            'gender'          => 'required|numeric',
            'date_of_birth'   => 'required|date',
            'class_id'        => 'required|numeric',
            'parent_id'       => 'required|numeric',
            'address'         => 'required|string',
            'tenant_id'       => 'required'
        ];
}
