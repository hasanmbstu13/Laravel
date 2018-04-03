<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantHostname extends Model
{

	protected $table = 'tenant_hostnames';

    protected $fillable = [
        'tenant_id', 'hostname', 'status'
    ];
}
