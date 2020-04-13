<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseInvoiceInformation;
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


    public function sendEmailWithAttachment(Request $request){
        $data = [
            "to" => "pavanbaddi911@gmail.com",
            "company_name" => "The Code Learners",
            "user" => [
                "name" => "Pavan Kumar"
            ],
        ];
        return Mail::to($data['to'])->send(new PurchaseInvoiceInformation());
    }


    public function sendEmailWithMultipleAttachments(Request $request){
        $data = [
            "to" => "pavanbaddi911@gmail.com",
            "attachments" => [
                [
                    "path" => public_path('uploads/inv-005.pdf'),
                    "as" => "Purchase Invoice NO 005.pdf",
                    "mime" => "application/pdf",
                ],
                [
                    "path" => public_path('uploads/inv-007.pdf'),
                    "as" => "Purchase Invoice NO 007.pdf",
                    "mime" => "application/pdf",
                ],
                [
                    "path" => public_path('uploads/inv-009.pdf'),
                    "as" => "Purchase Invoice NO 009.pdf",
                    "mime" => "application/pdf",
                ],
            ],
        ];
        return Mail::to($data['to'])->send(new PurchaseInvoiceInformation($data));
    }
    
}
