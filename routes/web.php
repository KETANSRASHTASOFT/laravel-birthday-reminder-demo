<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::get('/send-mail', 'App\Http\Controllers\MailController@index');
// Route::get('/send-mail', ['as' => 'send-mail','uses' => 'MailController@sendMail']);
// Route::get('send-mail', function () {
   
//     $details = [
//         'title' => 'Mail from Ketan Dalsaniya',
//         'body' => 'This is for testing email using smtp'
//     ];
   
//     \Mail::to('ketan.srashtasoft@gmail.com')->send(new \App\Mail\BirthdayMail($details));
   
//     dd("Email is Sent.");
// });
