<?php

namespace App\Http\Controllers;

use App\Models\Facts;
use Illuminate\Http\Request;

class FactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facts = Facts::where('user_id',auth()->user()->id)->get();
        return view('dashboard.Facts.index',compact('facts'));
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
            "fact_name" => 'required',
            "fact_number" => 'required',
            "fact_icon" => 'required',
        ]);
        Facts::create($request->except('_token')+[
            'user_id' => auth()->user()->id,
        ]);
        return back()->with('alerting','Fact added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facts $facts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facts $fact)
    {
        $fact = Facts::where('id',$fact->id)->first();
        return view('dashboard.Facts.edit',compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facts $fact)
    {
        $request->validate([
            "fact_name" => 'required',
            "fact_number" => 'required',
            "fact_icon" => 'required',
        ]);

        Facts::where('id',$fact->id)->update([
            'fact_name'=> $request->fact_name,
            'fact_number'=> $request->fact_number,
            'fact_icon'=> $request->fact_icon,
        ]);

        return redirect(route('fact.index'))->with('alerting','Fact updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facts $fact)
    {
        Facts::where('id',$fact->id)->delete();
        return back()->with('alerting','Fact deleted');
    }
}
