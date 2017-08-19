<?php

namespace App\Notifications;

use App\EmailNotificationSetting;
use App\ProjectMember;
use App\Setting;
use App\SmtpSetting;
use App\Traits\SmtpSettings;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\MailServiceProvider;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Config;

class NewProjectMember extends Notification
{
    use Queueable, SmtpSettings;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ProjectMember $member) {
        $user = User::find($member->user_id);
        $this->user = $user;
        $this->member = $member;
        $this->emailSetting = EmailNotificationSetting::all();
        $this->setMailConfigs();

//        $smtpSetting = SmtpSetting::first();
//
//        Config::set('mail.host', $smtpSetting->mail_host);
//        Config::set('mail.port', $smtpSetting->mail_port);
//        Config::set('mail.username', $smtpSetting->mail_username);
//        Config::set('mail.password', $smtpSetting->mail_password);
//        Config::set('mail.encryption', $smtpSetting->mail_encryption);
//        Config::set('mail.from.name', $smtpSetting->mail_from_name);
//        (new MailServiceProvider(app()))->register();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ($this->emailSetting[1]->send_email == 'yes') ? ['mail', 'database'] : ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {

        return (new MailMessage)
            ->subject('New Project Assigned - '.config('app.name').'!')
            ->greeting('Hello ' . ucwords($this->user->name) . '!')
            ->line('You have been added as a member to the project - ' . ucwords($this->member->project->project_name))
            ->action('Login to Dashboard', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {

        return $this->member->toArray();
    }
}
