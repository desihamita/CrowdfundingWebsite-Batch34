<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendOtpCodeMail;
use Mail;

class SendEmailOtpCode implements ShouldQueue
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle($event)
    {
        if($event->condition == 'register'){
            $pesan = "we're excited to have you get started. First, you need to confirm your account. This is your OTP Code : ";
        }
        else if ($event->condition == 'regenerate')
        {
            $pesan = 'Regenerate OTP successfull. This is your OTP Code : ';
        }

        Mail::to($event->user)->send(new SendOtpCodeMail($event->user, $pesan));
    }
}