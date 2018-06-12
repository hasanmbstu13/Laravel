<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    // get blogs 
    public function blogs()
    {
        //return $this->hasMany('App\Blog');
        return $this->belongsToMany('App\Blog');
    }
}
