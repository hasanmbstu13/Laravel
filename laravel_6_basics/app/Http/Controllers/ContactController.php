<?php


namespace App\Http\Controllers;


use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;

class ContactController
{
    public function show(){
        return view('contact');
    }

    public function store(){
        request()->validate(['email' => 'required|email']);
        // send the email
        $email = request('email');

//        Mail::raw('It works', function ($message) {
//
//            $message->to(request('email'))
//                ->subject('Hi There');
//
//        });

        Mail::to(request('email'))
            ->send(new ContactMe('shirts'));

        return redirect('/contact')
            ->with('message', 'Email sent!');

    }

}
