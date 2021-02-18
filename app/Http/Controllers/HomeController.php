<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth','verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return response
     */
    public function sendMail(){
        $details = [
            'title' => 'Mail from Ketan Dalsaniya',
            'body' => 'This is for testing email using smtp'
        ];
   
        $ans = \Mail::to('ketan.srashtasoft@gmail.com')->send(new \App\Mail\BirthdayMail($details));
       
        dd($ans);
    }
}
