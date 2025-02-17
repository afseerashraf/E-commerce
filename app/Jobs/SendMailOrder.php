<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
class SendMailOrder implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->order->customer->email)->send(new OrderMail($this->order));

    }
}
