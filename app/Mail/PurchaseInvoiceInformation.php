<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseInvoiceInformation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('pavanbaddi911@gmail.com')
        //             ->view('emails.purchase-invoice-information')
        //                 ->attach(public_path('uploads/sample.pdf'));

        $mail = $this->from('pavanbaddi911@gmail.com')
                    ->view('emails.purchase-invoice-information');

        
        if(!empty($this->data["attachments"])){
            foreach($this->data["attachments"] as $k => $v){
                $mail = $mail->attach($v["path"], [
                    'as' => $v["as"],
                    'mime' => $v["mime"],
                ]);
            }
        }
                
    }
}
