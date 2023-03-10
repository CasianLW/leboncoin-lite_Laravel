<?php

namespace App\Mail;

use App\Models\Annonce;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmedDeletedAnnonce extends Mailable
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
        return $this->markdown('emails.annonce_deleted')
                    ->with([
                        'url' => route('annonces.index'),
                    ]);
    }
}
