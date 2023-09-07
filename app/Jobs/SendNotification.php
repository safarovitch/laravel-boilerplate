<?php

namespace App\Jobs;

use App\Events\MessageNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $message, $silent;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $silent = false)
    {
        $this->message = $message;
        $this->silent = $silent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new MessageNotification($this->message, $this->silent));
    }
}
