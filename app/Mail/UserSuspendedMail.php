<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSuspendedMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $reason;

    public function __construct(User $user, string $reason)
    {
        $this->user = $user;
        $this->reason = $reason;
    }

    public function build()
    {
        return $this
            ->subject('Your Account Suspension')
            ->view('emails.user_suspended') // Adjust to your view path
            ->with([
                'username' => $this->user->username,
                'reason' => $this->reason,
            ]);
    }
}
