<?php

namespace App\Providers;

use App\Listeners\ArtisanListener;
use App\Listeners\BackupListener;
use App\Listeners\NewUserListener;
use App\Models\Order;
use App\Observers\OrderObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Spatie\Backup\Events\BackupWasSuccessful;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            NewUserListener::class
        ],
        // Illuminate\Console\Events\CommandFinished::class => [
        //     ArtisanListener::class
        // ],
        // Illuminate\Console\Events\ArtisanStarting::class => [
        //     ArtisanListener::class
        // ]
        BackupWasSuccessful::class => [
            BackupListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Order::observe(OrderObserver::class);
    }
}
