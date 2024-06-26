<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Mail\ConfirmationAnnonce;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedDeletedAnnonce;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $annonces = Annonce::all();
        $annonces = Annonce::where('status', true)->orderBy('created_at', 'desc')
        ->get();
        foreach ($annonces as $annonce) {
            $annonce->price /= 10;
        }
        return view('annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'title' => 'required|min:3',
            'email' => ['required','email','regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'name' => 'required',
            'description' => 'required|min:15',
            'location' => 'required',
            'price' => 'required|numeric',
        ]);
    
        $token = \Illuminate\Support\Str::random(32);
    
        // Annonce::create(array_merge($request->all(), ['token' => $token]));
        $annonce = new Annonce();
        $annonce->title = $request->title;
        $annonce->email = $request->email;
        $annonce->name = $request->name;
        $annonce->description = $request->description;
        $annonce->location = $request->location;
        $annonce->price = $request->price * 10;
        $annonce->token = $token;
        $annonce->status = false;
        $annonce->save();

        Mail::to($validated['email'])->send(new ConfirmationAnnonce($annonce));

        
        return redirect()->route('annonces.index')
            ->with('success', 'Email de confirmation ennvoyé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonce = Annonce::find($id);
        $annonce->price /= 10;
        return view('annonces.show', compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::find($id);
        return view('annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'email' => 'required|email',
            'name' => 'required',
            'description' => 'required|min:15',
            'location' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);
    
        // $annonce = Annonce::find($id);
        // $annonce->update($request->all());
        $annonce = Annonce::find($id);
        $annonce->title = $request->title;
        $annonce->email = $request->email;
        $annonce->name = $request->name;
        $annonce->description = $request->description;
        $annonce->location = $request->location;
        $annonce->price = $request->price * 10;
        $annonce->status = $request->status;
        $annonce->save();
    
        return redirect()->route('annonces.index')
            ->with('success', 'Annonce mise a jour avec succèss.');
    }
        /**
     * Remove the specified resource from storage.
      */
      public function destroy($token)
    {
        $annonce = Annonce::where('token', $token)->first();
        if (!$annonce) {
            $errors = new MessageBag(['Annonce not found']);
            return redirect()->route('annonces.index')->withErrors($errors);
        }
        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée.');
}
      public function deleteViaMail($token)
    {
        $annonce = Annonce::where('token', $token)->first();
        if (!$annonce) {
            $errors = new MessageBag(['Annonce not found']);
            return redirect()->route('annonces.index')->withErrors($errors);
        }
        $annonce->delete();
        Mail::to($annonce->email)->send(new ConfirmedDeletedAnnonce($annonce));


        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée via mail.');
}}


