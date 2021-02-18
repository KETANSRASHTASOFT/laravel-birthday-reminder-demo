<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Carbon\Carbon;
class MailController extends Controller
{
  /**
     * Show the application dashboard.
     *
     * @return response
     */
    public function index(){

    	$users = User::whereMonth('date_of_birth', '=', Carbon::now()->format('m'))->whereDay('date_of_birth', '=', Carbon::now()->format('d'))->get();

    	
    	foreach ($users as $key => $user) {
    		$template_title = "Happy Birthday %s %s";
        $title = sprintf($template_title, $user->first_name,$user->last_name);

        $template = "“Our whole team is wishing you the happiest of birthdays and all the best to you in the year to come and a wonderful year! Happy Birthday %s.”";
        $body = sprintf($template, $user->first_name);
        $details = [
            'title' => $title,
            'body' => $body
        ];
        $ans = \Mail::to($user->email)->send(new \App\Mail\BirthdayMail($details));
    	}
    	echo "Send out a birthday message to users whose birthdays are today.";
    }
}
