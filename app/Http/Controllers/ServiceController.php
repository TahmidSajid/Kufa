<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.services.index')->with([
            'services' => Services::where('user_id',auth()->user()->id)->get(),
        ]);
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
            'service_name'=> 'required',
            'service_icon'=> 'required',
            'service_description'=> 'required',
        ]);
        Services::create($request->except('_token')+[
            'user_id' => auth()->user()->id,
        ]);
        return back()->with('alerting','New service added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.services.edit')->with([
            'service' => Services::where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'service_name'=> 'required',
            'service_icon'=> 'required',
            'service_description'=> 'required',
        ]);
        Services::where('id',$id)->update([
            'service_name'=> $request->service_name,
            'service_icon'=> $request->service_icon,
            'service_description'=> $request->service_description,
        ]);
        return redirect(route('services.index'))->with('alerting','service updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Services::where('id',$id)->delete();
        return redirect(route('services.index'))->with('alerting','service deleted');
    }
}
