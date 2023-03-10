<?php

namespace App\Mail;

use App\Models\Annonce;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmationAnnonce extends Mailable
{
    use Queueable, SerializesModels;

    public $annonce;

    public function __construct(Annonce $annonce)
    {
        $this->annonce = $annonce;
    }

    public function build()
    {
        $token = $this->annonce->token;
        return $this->markdown('emails.annonce_validation')
                    ->with([
                        'url' => route('validate.annonce', ['token' => $token]),
                        'token' => $token
                    ]);
    }
}
