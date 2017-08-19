<?php

namespace App\Notifications;

use App\EmailNotificationSetting;
use App\Task;
use App\Traits\SmtpSettings;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewTask extends Notification
{
    use Queueable, SmtpSettings;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
        $this->user = User::find($task->user_id);
        $this->emailSetting = EmailNotificationSetting::all();
        $this->setMailConfigs();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ($this->emailSetting[3]->send_email == 'yes') ? ['mail', 'database'] : ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('admin.tasks.show', $this->task->project_id);

        $content = ucfirst($this->task->heading).'<p>
            <b style="color: green">Due On: '.$this->task->due_date->format('d M, Y').'</b>
        </p>';

        return (new MailMessage)
            ->subject('New Task Assigned to You - '.config('app.name').'!')
            ->greeting('Hello '.ucwords($this->user->name).'!')
            ->markdown('mail.task.created', ['url' => $url, 'content' => $content]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->task->toArray();
    }

}
