<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pending@gamil.com')
        ->subject('Nueva contraseña')
        ->view('emails.recovery-password')
        ->with([
            'name' => $this->user->name,
            'password' => $this->password,
        ]);
    }
}
