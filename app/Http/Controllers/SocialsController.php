<?php

namespace App\Http\Controllers;

use App\Models\Socials;
use Illuminate\Http\Request;

class SocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'social_media_name'=> 'required',
            'social_media_link'=> 'required',
            'social_media_icon'=> 'required',
        ]);
        Socials::create($request->except('_token')+[
            'user_id' => auth()->user()->id,
        ]);
        return back()->with('alerting','A new Social media account added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Socials $socials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Socials $socials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Socials $socials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Socials $social)
    {
        Socials::where('id',$social->id)->delete();
        return back()->with('alerting','A Social media account deleted');
    }
}
