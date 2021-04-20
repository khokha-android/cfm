<?php


namespace App\Mail;


use Illuminate\Mail\Mailable;

class SendEmail extends Mailable
{
    public $data;

    public function __construct($data)
    {
      $this->data = $data;
    }

    public function build(){
        return $this->view('emails');
    }
}
