<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ProjectMember extends Model
{
    use Notifiable;

    public function routeNotificationForMail()
    {
        return $this->user->email;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project() {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public static function byProject($id){
        return ProjectMember::where('project_id', $id)->get();
    }
}
