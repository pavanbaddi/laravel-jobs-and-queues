<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Mail;
class HomeController extends Controller
{
    public function previewEmail(Request $request){
        $data = [
            "company_name" => "The Code Learners",
            "user" => [
                "name" => "Pavan Kumar"
            ],
        ];
        return new WelcomeEmail($data);
    }

    public function sendEmailSynchronously(Request $request){
        $data = [
            "to" => "to-email@example.com",
            "company_name" => "The Code Learners",
            "user" => [
                "name" => "Pavan Kumar"
            ],
        ];
        return Mail::to($data['to'])->send(new WelcomeEmail($data));
    }


    public function sendEmailQueued(Request $request){
        $data = [
            "to" => "to-email@example.com",
            "company_name" => "The Code Learners",
            "user" => [
                "name" => "Pavan Kumar"
            ],
        ];
        return Mail::to($data['to'])->queue(new WelcomeEmail($data));
    }
}
