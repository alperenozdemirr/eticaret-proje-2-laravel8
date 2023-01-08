<?php

namespace App\Jobs;

use App\Mail\ConfirmationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ConfirmationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $email;
    public $code;
    public function __construct($data,$email,$code)
    {
        $this->data=$data;
        $this->email=$email;
        $this->code=$code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Mail::to('ozdemiiralperen@gmail.com')->send(new ConfirmationMail());
        Mail::to($this->email)->send(new ConfirmationMail($this->data,$this->code));
        //->with('data',$this->data)->with(['code'=>session()->get('randomCode')])
    }
}
