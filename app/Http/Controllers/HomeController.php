<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseInvoiceInformation;
use App\Mail\SubscriptionRenewal;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Validator;

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
    
    public function emailOfSubscriptionRenewal(){
        return (new SubscriptionRenewal());
    }

    public function createForm(){
        return view('product.create_form');
    }

    public function contactUs(Request $request){
        return view('form-validation.contact-us', []);
    }

    public function sendContactUsMessage(Request $request){
        $validated_data = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
        ]);

        dd($validated_data);
    }

    public function companyProfile(Request $request){
        return view('form-validation.company-profile-form', []);
    }

    public function saveCompanyProfile(Request $request){
        $validated_data = $request->validate([
            'company_name' => 'required|max:255',
            'company_location' => 'nullable',
            'company_email' => 'required|email',
            'company_point_of_contact.0.name' => 'required',
            'company_point_of_contact.0.phone' => 'required|numeric',
            'company_point_of_contact.0.email' => 'required|email',
        ]);

        dd($validated_data);
    }

    public function userProfileForm(Request $request){
        return view('form-validation.user-profile-form', []);
    }

    public function saveUserProfileForm(Request $request){

        $rules=[
            'image' => 'file|image|dimensions:min_width=100,min_height=100',
        ];
        $validator_object = Validator::make($request->all(),$rules);

        $validator_object->after(function ($validator) {
            $validator->errors()->add('image', 'Something is wrong with image. check once again and reupload.');
        });

        return redirect('user/profile')
                        ->withErrors($validator_object)
                        ->withInput();

        dd($validator_object, $validator_object->errors());
        exit;
        $validated_data = $request->validate([
            // 'image' => 'file ',
            'image' => 'file|image|mimetypes:image/jpeg|dimensions:min_width=1000,min_height=1200',
        ]);
        

            /*
            The image must be a file.
            The image must be an image.
            The image must be a file of type: image/jpeg.
            The image has invalid image dimensions.
            */

        dd($validated_data);
    }
}

