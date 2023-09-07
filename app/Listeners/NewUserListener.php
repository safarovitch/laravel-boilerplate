<?php

namespace App\Listeners;

use App\Enums\UserRole;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        // Add customer role to registered user
        $event->user->assignRole(UserRole::CUSTOMER);
    }
}
