<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $view;
    protected $data;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($view, $data, $email)
    {
        $this->view = $view;
        $this->data = $data;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send($this->view, $this->data, function ($message) {
            $message->to($this->email, 'Ban Quản Trị');
        });
    }
}
