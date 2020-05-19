<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * An user has many articles
     * @return object
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function projects() 
    {
        return $this->hasMany(Project::class);
    }
}

// hasONe
// hasMany
// belongsTo
// belongsToMany
// morphMany
// morphToMany

// $user = User::find(1); // select * from user where id = 1
// $user->projects; // select * from projects where user_id = $user->id
// $user->projects->first()
// $user->projects->last()
// $user->projects->find($project_id - note specific project)
// $user->projects->split(3)
// $user->projects->groupBy