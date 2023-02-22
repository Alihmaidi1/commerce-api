<?php

namespace App\Jobs;

use App\Mail\resetcode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class sendmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $email,$code;


    public function __construct($email,$code)
    {
        $this->email=$email;
        $this->code=$code;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->email)->send(new resetcode($this->code));
    }
}