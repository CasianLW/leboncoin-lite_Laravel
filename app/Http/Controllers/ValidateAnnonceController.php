<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Mail\ConfirmedAnnonce;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Mail;

class ValidateAnnonceController extends Controller
{
    /**
     * Validate an announcement with the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function validateAnnonce($token)
    {
        $annonce = Annonce::where('token', $token)->first();

        if (!$annonce) {
            $errors = new MessageBag(['Invalid token']);
            return redirect()->route('annonces.index')->withErrors($errors);
        }

        if ($annonce->status === 1) {
            $errors = new MessageBag(['Annonce déjà validée']);
            return redirect()->route('annonces.index')->withErrors($errors);
        }

        $annonce->status = 1;
        $annonce->save();
        
        Mail::to($annonce->email)->send(new ConfirmedAnnonce($annonce));


        return redirect()->route('annonces.index')
            ->with('success', 'Annonce validée avec succèss !');
    }
}