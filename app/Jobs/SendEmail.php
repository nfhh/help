<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $con;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $con)
    {
        $this->email = $email;
        $this->con = $con;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::raw($this->con['url'] . ' ' . $this->con['body'], function ($message) {
            $message->to($this->email)->subject('网站反馈提醒');
        });
    }
}
