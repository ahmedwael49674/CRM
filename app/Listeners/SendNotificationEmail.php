<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\NewUserCreated;
use App\Mail\NewCompanyCreated;
use Auth;


class SendNotificationEmail
{

    /**
     * Handle the event.
     *
     * @param  NewUserCreated  $event
     * @return void
     */
    public function handle(NewUserCreated $event)
    {
        $company    =   $event->company;
        Mail::to(Auth::user()->email)->send(new NewCompanyCreated($company));
    }
}
