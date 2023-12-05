<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mails = Emails::where('user_id',auth()->user()->id)->get();
        return view('dashboard.Contact_mail.index',compact('mails'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Emails $email)
    {
        return view('dashboard.Contact_mail.show',compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emails $emails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emails $emails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emails $email)
    {
        Emails::where('id',$email->id)->delete();
        return back()->with('alerting','Email deleted');
    }
}
