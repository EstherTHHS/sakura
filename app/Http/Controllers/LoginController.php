<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login()
    {
        //control pervious data with session 
        if (session()->has("username")) {
            return redirect("/maindash");
        }
        return view("login");
    }

    public function logout()
    {
        //have to delete session before you log out 
        session()->forget('username');
        return redirect("/login");
    }

    public function loginChecker(LoginRequest $request)
    {
        //below code is default Request $request bulit in framework
        //check validation before into server side 
        //for check ,need Request class as a parameter 
        // $request->validate([
        //     "username" => "required",
        //     //pass must be needed and alos min8 chars 
        //     "password" => "required|min:5|max:7|",

        //     "email" => "required|email"
        // ]);

        Log::info("login Info", ["User $request->username is login in our system!"]);
        $request->session()->put('username', $request->username);
        // session(['username' =>  $request->username, 'password' => $request->password]);

        //mail sending one to one
        $mail = [
            'titleMail' => "Welcome From Sakura!",
            'mailbody' => "Per your request, heres a quick note to inform you that the Eloquent Performance Patterns series has been updated",
            'by' => 'Jeffrey Way'
        ];
        Mail::to($request->email)->send(new WelcomeMail($mail));

        //Sending multiple email
        // $emails = ["estherhtoo2172000@gmail.com", "eaintchitsu5@gmail.com", "phyuthwekhin1@gmail.com"];
        // Mail::send(
        //     'mail.welMail',
        //     [
        //         'titleMail' => "Hello Sweet December",
        //         'mailbody' => "Christmas bells are Ringing!!Wishing you a magical, magnificent, and merry month of December!!",
        //         'by' => 'Esther'
        //     ],

        //     function ($message) use ($emails) {
        //         $message->to($emails)->subject('Sakura Hospital');
        //     }


        // );

        return redirect("/maindash");
    }
}
