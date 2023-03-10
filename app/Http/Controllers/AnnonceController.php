<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

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
        $annonces = Annonce::where('status', true)->get();
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
        $request->validate([
            'title' => 'required|min:3',
            'email' => 'required|email',
            'name' => 'required',
            'description' => 'required|min:15',
            'location' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);
    
        $token = \Illuminate\Support\Str::random(32);
    
        Annonce::create(array_merge($request->all(), ['token' => $token]));
    
        return redirect()->route('annonces.index')
            ->with('success', 'Annonce created successfully.');
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
    
        $annonce = Annonce::find($id);
        $annonce->update($request->all());
    
        return redirect()->route('annonces.index')
            ->with('success', 'Annonce updated successfully.');
    }
        /**
     * Remove the specified resource from storage.
      */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        $annonce->delete();
    
        return redirect()->route('annonces.index')
            ->with('success', 'Annonce deleted successfully.');
    }}

