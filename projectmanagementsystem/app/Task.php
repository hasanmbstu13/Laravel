<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use Notifiable;

    public function routeNotificationForMail()
    {
        return $this->user->email;
    }

    protected $dates = ['due_date'];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $projectId
     * @param null $userID
     */
    public static function projectOpenTasks($projectId, $userID=null)
    {
        $projectTask = Task::where('status', 'incomplete');

        if($userID)
        {
            $projectIssue = $projectTask->where('user_id', '=', $userID);
        }

        $projectIssue = $projectTask->where('project_id', $projectId)
            ->get();

        return $projectIssue;
    }

    public static function projectCompletedTasks($projectId)
    {
        return Task::where('status', 'completed')
            ->where('project_id', $projectId)
            ->get();
    }

}
