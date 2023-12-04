<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brands::where('user_id',auth()->user()->id)->get();
        return view('dashboard.Brand.index',compact('brands'));
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
            'brand_name'=> 'required',
            'brand_image'=> 'required|file',
        ]);
        Brands::create($request->except('_token')+[
            "brand_name" =>  $request->brand_name,
            "user_id"=> auth()->user()->id,
        ]);

        //********* Inserting image in date base **********

        if($request->hasFile('brand_image')){
            $new_image = Str::slug($request->brand_name).time().".".$request->file('brand_image')->getClientOriginalExtension();
            $image = Image::make($request->file('brand_image'))->resize(151,69);
            $image->save(base_path('public/uploads/brand_images/'.$new_image),80);
            Brands::where('brand_name',$request->brand_name)->update([
                "brand_image" => $new_image,
            ]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brand)
    {
        return view('dashboard.Brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brands $brand)
    {
        $request->validate([
            'brand_name'=> 'required',
        ]);
        Brands::where('id',$brand->id)->update([
            "brand_name" => $request->brand_name,
        ]);
        if($request->hasFile('brand_image')){
            unlink(base_path('public/uploads/brand_images/'.$brand->brand_image));
            $new_image = Str::slug($request->brand_name).time().".".$request->file('brand_image')->getClientOriginalExtension();
            $image = Image::make($request->file('brand_image'))->resize(151,69);
            $image->save(base_path('public/uploads/brand_images/'.$new_image),80);
            Brands::where('id',$brand->id)->update([
                "brand_image" => $new_image,
            ]);
        }
        return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brand)
    {
        unlink(base_path('public/uploads/brand_images/'.$brand->brand_image));
        Brands::where('id',$brand->id)->delete();
        return back();
    }
}
