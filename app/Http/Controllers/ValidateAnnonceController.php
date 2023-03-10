<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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

        return redirect()->route('annonces.index')
            ->with('success', 'Annonce validée avec succèss !');
    }
}