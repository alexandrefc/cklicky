<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendStampCampaign extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailCampaign;

    public function __construct($mailCampaign)
    {
        $this->mailCampaign = $mailCampaign;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mailCampaign->title)->markdown('emails.send-stamp-campaign', [$this->mailCampaign]);
    }
}
