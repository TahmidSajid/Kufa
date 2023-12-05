<?php

namespace App\Http\Controllers;

use App\Models\Portfolios;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ****** getting all portfolio data ******

        $portfolios = Portfolios::where('user_id',auth()->user()->id)->get();

        return view('dashboard.Portfolios.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Portfolios.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "category" => 'required',
            "portfolio_name" => 'required',
            "portfolio_heading" => 'required',
            "portfolio_description" => 'required',
            "portfolio_image" => 'required|file',
        ]);

        //********* create column in data base **********

        Portfolios::create($request->except('_token')+[
            "user_id"=> auth()->user()->id,
        ]);

        //********* Image making **********

        $new_image = Str::slug($request->category).time().".".$request->file('portfolio_image')->getClientOriginalExtension();
        $image = Image::make($request->file('portfolio_image'))->resize(640,480);
        $image->save(base_path('public/uploads/portfolio_images/'.$new_image),80);

        //********* Inserting image in date base **********

        if($request->hasFile('portfolio_image')){
            Portfolios::where('portfolio_name',$request->portfolio_name)->update([
                "portfolio_image" => $new_image,
            ]);
        }

        return redirect(route('portfolio.index'))->with('alerting','portfolio added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolio = Portfolios::where('id',$id)->first();
        return view('dashboard.Portfolios.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Portfolios::where('id',$id)->first();
        return view('dashboard.Portfolios.edit',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "category" => 'required',
            "portfolio_name" => 'required',
            "portfolio_heading" => 'required',
            "portfolio_description" => 'required',
        ]);
        Portfolios::where('id',$id)->update([
            'category'=> $request->category,
            'portfolio_name'=> $request->portfolio_name,
            'portfolio_heading'=> $request->portfolio_heading,
            'portfolio_description'=> $request->portfolio_description,
        ]);



        //********* Inserting image in date base **********

        if($request->hasFile('portfolio_image')){
            $old_image = Portfolios::where('id',$id)->first('portfolio_image');
            unlink(base_path('public/uploads/portfolio_images/'.$old_image['portfolio_image']));
            $new_image = Str::slug($request->category).time().".".$request->file('portfolio_image')->getClientOriginalExtension();
            $image = Image::make($request->file('portfolio_image'))->resize(640,480);
            $image->save(base_path('public/uploads/portfolio_images/'.$new_image),80);
            Portfolios::where('portfolio_name',$request->portfolio_name)->update([
                "portfolio_image" => $new_image,
            ]);
        }
        return redirect(route('portfolio.index'))->with('alerting','portfolio updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Portfolios::where('id',$id)->first('portfolio_image');
        unlink(base_path('public/uploads/portfolio_images/'.$image['portfolio_image']));
        Portfolios::where('id',$id)->delete();
        return back()->with('alerting','portfolio deleted');
    }
}
