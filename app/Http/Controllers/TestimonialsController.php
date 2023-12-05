<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;



class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testis = Testimonials::where('user_id',auth()->user()->id)->get();
        return view('dashboard.Testimonial.index',compact('testis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Testimonial.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_feedback'=> 'required',
            'customer_name'=> 'required',
        ]);
        Testimonials::create($request->except('_token')+[
            'user_id'=> auth()->user()->id,
        ]);
        if($request->hasFile('customer_image')){
                $new_image = Str::slug($request->customer_name).time().".".$request->file('customer_image')->getClientOriginalExtension();
                $image = Image::make($request->file('customer_image'))->resize(320,240);
                $image->save(base_path('public/uploads/customer_images/'.$new_image),80);
            Testimonials::where('customer_feedback',$request->customer_feedback)->update([
                'customer_image'=> $new_image,
            ]);
        }
        return redirect(route('testimonial.index'))->with('alerting','Testimonial added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonials $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonials $testimonial)
    {
        return view('dashboard.Testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonials $testimonial)
    {
        Testimonials::where('id',$testimonial->id)->update([
            'customer_feedback'=> $request->customer_feedback,
            'customer_name' =>$request->customer_name,
        ]);
        if($request->hasFile('customer_image')){
            if($testimonial->customer_image){
                $old_image = $testimonial->customer_image;
                unlink(base_path('public/uploads/customer_images/'.$old_image));
            }
            $new_image = Str::slug($request->customer_name).time().".".$request->file('customer_image')->getClientOriginalExtension();
            $image = Image::make($request->file('customer_image'))->resize(320,240);
            $image->save(base_path('public/uploads/customer_images/'.$new_image),80);
            Testimonials::where('id',$testimonial->id)->update([
            'customer_image'=> $new_image,
            ]);
        }
        return redirect(route('testimonial.index'))->with('alerting','Testimonial Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonials $testimonial)
    {
        if($testimonial->customer_image){
            $old_image = $testimonial->customer_image;
            unlink(base_path('public/uploads/customer_images/'.$old_image));
        }
        Testimonials::where('id',$testimonial->id)->delete();
        return redirect(route('testimonial.index'))->with('alerting','Testimonial Deleted');
    }
}
