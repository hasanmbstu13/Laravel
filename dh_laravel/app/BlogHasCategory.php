<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogHasCategory extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_has_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['blog_id','blog_category_id'];
    
}
