<?php

namespace App\Mail;

use App\User;
use Crypt;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmailRegister extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // make token
        $encryptedEmail = Crypt::encrypt($this->user->email);

        $link = 'localhost:8000/users/verify/'.$this->user->id.'/'. $encryptedEmail;
        return $this->from('Sipras@sipras.com', 'Sipras')
                    ->subject('Verivikasi akun anda')
                    ->with('link', $link)
                    ->view('user.signup');
    }
}
