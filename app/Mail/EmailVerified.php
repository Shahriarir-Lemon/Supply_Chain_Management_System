<?php

namespace App\Mail;

use App\Http\Controllers\Customer\CustomerRegController;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // Import the User model

class EmailVerified extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

   
    public function __construct(Customer $user)
    {
        $this->user = $user;
    }

   
    public function build()
    {
        return $this->subject('Email Verified')
                    ->view('Email.email_verification')->with('user', $this->user);
    }
}
