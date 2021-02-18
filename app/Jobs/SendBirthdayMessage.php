<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendBirthdayMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    // private $twilioClient;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $template_title = "Happy Birthday %s %s";
        $title = sprintf($template_title, $this->user->first_name,$this->user->last_name);

        $template = "“Our whole team is wishing you the happiest of birthdays and all the best to you in the year to come and a wonderful year! Happy Birthday %s %s.”";
        $body = sprintf($template, $this->user->first_name,$this->user->last_name);
        $details = [
            'title' => $title,
            'body' => $body
        ];
        $ans = \Mail::to($this->user->email)->send(new \App\Mail\BirthdayMail($details));
        Log::info($body);
    }
}
