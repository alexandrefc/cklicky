<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use App\Mail\PaymentCompletedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPaymentCompletedNotification
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
     * @param  PaymentCompleted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        // Mail::to($event->paymentIntent->email)->send(new PaymentCompletedMail($event->paymentIntent));

        Mail::to('t.sz@aol.com')->send(new PaymentCompletedMail($event->paymentIntent));


    }
}
