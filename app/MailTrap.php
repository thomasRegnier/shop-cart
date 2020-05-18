<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTrap extends Mailable
{
    //

    private $datas;
    use Queueable, SerializesModels;

    public function __construct($datas)
    {
        //
        $this->datas = $datas;
    }

    public function build()
    {
        return $this->from('thomas.regnier3001@gmail.com', 'Mailtrap')
            ->subject('Shop message')
            ->view('mail')
            ->with(['order' => $this->datas]);
    }
}
