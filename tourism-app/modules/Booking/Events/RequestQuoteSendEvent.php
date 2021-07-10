<?php
namespace Modules\Booking\Events;

use Modules\Booking\Models\Booking;
use Illuminate\Queue\SerializesModels;
use Modules\Booking\Models\RequestQuote;

class RequestQuoteSendEvent
{
    use SerializesModels;

    /**
     * @var $requestQuote
     */
    public $requestQuote;

    public function __construct(RequestQuote $requestQuote)
    {

        $this->requestQuote = $requestQuote;
    }
}
