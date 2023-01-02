<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;

class RecordLoginInfo
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->user->forceFill([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => request()->getClientIp()
        ])->save();
    }
}
