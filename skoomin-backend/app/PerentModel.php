<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;

class PerentModel extends Model
{
    use BelongsToTenants;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_url',
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'cnic',
        'gender',
        'date_of_birth',
        'class_id',
        'parent_id',
        'address'
    ];
}
