<?php

namespace App\Listeners;

use App\Mail\WelcomeMail;
use App\Events\PasswordChanged;
use App\Mail\PasswordChangedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPasswordChangedEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PasswordChanged  $event
     * @return void
     */
    public function handle(PasswordChanged $event)
    {
        Mail::to($event->email)->send(new PasswordChangedMail());
    }
}
