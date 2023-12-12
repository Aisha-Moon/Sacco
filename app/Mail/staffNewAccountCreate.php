<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class staffNewAccountCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;

    /**
     * Create a new message instance.
     */
    public function __construct($staff)
    {
        $this->staff = $staff;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('email.staff_account') ->subject(config('app.name') . ' - Staff New Account Create Mail');
    }
    
}
