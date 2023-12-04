<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banners::where('user_id',auth()->user()->id)->get();
        return view('dashboard.Banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner_description' =>'required',
            'banner_image' =>'required|file',
        ]);
        if($request->status == 'active'){
            Banners::where('user_id',auth()->user()->id)->update([
                'status' => 'deactive',
            ]);
        }
        $banners_id = Banners::create($request->except('_token')+[
            'user_id'=> auth()->user()->id,
        ]);
        if($request->hasFile('banner_image')){
            $new_image = $banners_id->id.time().".".$request->file('banner_image')->getClientOriginalExtension();
            $image = Image::make($request->file('banner_image'))->resize(640,480);
            $image->save(base_path('public/uploads/banner_images/'.$new_image),80);
            Banners::where('id',$banners_id->id)->update([
                "banner_image" => $new_image,
            ]);
        }
        return redirect(route('banner.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banners $banner)
    {
        return view('dashboard.Banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banners $banner)
    {
        $request->validate([
            'banner_description' =>'required',
        ]);
        if($request->status == 'active'){
            Banners::where('user_id',auth()->user()->id)->update([
                'status' => 'deactive',
            ]);
        }
        Banners::where('id',$banner->id)->update([
            "banner_description" => $request->banner_description,
            "status" => $request->status,
        ]);
        if($request->hasFile('banner_image')){
            unlink(base_path('public/uploads/banner_images/'.$banner->banner_image));
            $new_image = $banner->id.time().".".$request->file('banner_image')->getClientOriginalExtension();
            $image = Image::make($request->file('banner_image'))->resize(640,480);
            $image->save(base_path('public/uploads/banner_images/'.$new_image),80);
            Banners::where('id',$banner->id)->update([
                "banner_image" => $new_image,
            ]);
        }
        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banners $banner)
    {
        unlink(base_path('public/uploads/banner_images/'.$banner->banner_image));
        Banners::where('id',$banner->id)->delete();
        return redirect(route('banner.index'));
    }
}
