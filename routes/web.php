<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MailClient;
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

Route::get('/sendMail', function(){
    try{
        Mail::to("test@gmail.com")->send(new MailClient);
        return "Send emal envoye !";
    }catch(Exception $e){
        dump($e->getMessage());
    }
});