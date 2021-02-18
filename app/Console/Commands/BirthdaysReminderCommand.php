<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Models\User;
use App\Jobs\SendBirthdayMessage;


class BirthdaysReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthdays:send-wish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send out a birthday message to users whose birthdays are today.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now()->format('Y-m-d');
        $users = User::whereMonth('date_of_birth', '=', Carbon::now()->format('m'))->whereDay('date_of_birth', '=', Carbon::now()->format('d'))->get();
        if(!empty($users)) {
            foreach ($users as $user) {
                SendBirthdayMessage::dispatch($user);
            }
        }
        // return 0;
    }
}
