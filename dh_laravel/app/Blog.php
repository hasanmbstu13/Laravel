<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','slug','text','image','published_at'];

    // get all categories for tha posts 
    public function categories()
    {
    	return $this->belongsToMany('App\BlogCategory', 'blog_has_categories', 'blog_id', 'blog_category_id');
    }
}
