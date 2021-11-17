<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function send(Request $request){
        $name = $request->name;
        $email = $request->email;
        $type = $request->type;
        $text = $request->text;
        $data = 'Fullname: '.$name."\n".'Email: '.$email."\n".'Type: '.$type."\n".'Text: '.$text;
        \Mail::raw($data, function($message) {
            $message->from('alquranulazeem40770@gmail.com', 'Azeem');
            $message->to('alquranulazeem40770@gmail.com');
            $message->subject("Feedback from Azeem's app");
        });
        if (\Mail::failures()) {
            // return failed mails
            return new Error(\Mail::failures());
        }
        else
            return 'Email sent successfully!';
    }
}
