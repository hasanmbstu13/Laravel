<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];

    public function path()
    {
    	return route('articles.show', $this);
    }

    public function user() 
    {	
    	return $this->belongsTo(User::class);
    	// return $this->belongsTo('App\User', 'foreign_key', 'user_id');
    	// return $this->belongsTo('App\User', 'user_id');
    }
}
