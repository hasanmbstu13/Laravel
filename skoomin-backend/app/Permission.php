<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Role extends EntrustPermission
{

    protected $table = 'permissions';

    protected $fillable = [
        'name', 'display_name', 'description'
    ];

}

