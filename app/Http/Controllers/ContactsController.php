<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Educations;
use Illuminate\Http\Request;

class ContactsController extends Controller
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
            'phone' => 'required',
            'office_address' => 'required',
            'city' => 'required',
            'email' => 'required',
            'contact_description'=> 'required',
        ]);
        $address = $request->office_address." , ".$request->city;
        Contacts::create($request->except('_token','office_address','city')+[
            'address' => $address,
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacts $contact)
    {
        $address = explode(',',$contact->address);
        $updating = true;
        $contacts = $contact;
        $cnct = false;
        if($contacts){
            $cnct = true;
        }
        else{
            $cnct = false;
        }
        return view('dashboard.about_me')->with([
            'description' => auth()->user()->introduction,
            'educations'=> Educations::where('user_id',auth()->user()->id)->get(),
            'contacts'=> $contacts,
            'cnct'=> $cnct,
            'updating'=> $updating,
            'office'=> $address[0],
            'city'=> $address[1],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacts $contact)
    {
        $request->validate([
            'phone' => 'required',
            'office_address' => 'required',
            'city' => 'required',
            'email' => 'required',
            'contact_description'=> 'required',
        ]);
        Contacts::where('id',$contact->id)->update([
            'phone'=> $request->phone,
            'address'=> $request->office_address.' , '.$request->city,
            'email'=> $request->email,
            'contact_description'=> $request->contact_description,
        ]);
        return redirect(route('about_me'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
