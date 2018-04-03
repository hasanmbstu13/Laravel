<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
   use softDeletes;

   /**
    * The attributes that should be mutated to dates
    * @var array
    */
   protected $dates = ['deleted_at'];

   /**
    * The table associated with the model
    * @var string
    */
   protected $table = 'Class_groups';
}
