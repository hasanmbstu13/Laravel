<?php
namespace Modules\Booking\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\RequestQuote;

class RequestQuoteSendEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $requestQuote;
    public $content;
    protected $email_type;


    public function __construct(RequestQuote $requestQuote , $content ,$to = 'admin')
    {
        $this->requestQuote = $requestQuote;
        $this->content = $content;
        $this->email_type = $to;
    }

    public function build()
    {
        $subject = '';
        switch ($this->email_type){
            case "admin":
                $subject = __('[:site_name] New inquiry has been made',['site_name'=>setting_item('site_title')]);
                break;
            case "vendor":
                $subject = __('[:site_name] You get new inquiry request',['site_name'=>setting_item('site_title')]);
                break;
        }
        return $this->subject($subject)->view('Booking::emails.enquiry')->with([
            'requestQuote' => $this->requestQuote,
            'content' => $this->content,
            'to'=>$this->email_type
        ]);
    }
}
