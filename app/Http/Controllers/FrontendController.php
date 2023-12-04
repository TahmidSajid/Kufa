<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Brands;
use App\Models\Contacts;
use App\Models\Educations;
use App\Models\Facts;
use App\Models\Portfolios;
use App\Models\Services;
use App\Models\Socials;
use App\Models\Testimonials;
Use App\Models\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactsMail;
use App\Models\ContactEmails;
use App\Models\Emails;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function fronend_page(){

        $contact_info = Contacts::where('user_id',auth()->user()->id)->first();
        $city = explode(",",$contact_info->address)[1];

        return view('frontend.index')->with([
            'banner' => Banners::where('user_id',auth()->user()->id)->where('status','active')->get(),
            'socials' => Socials::where('user_id',auth()->user()->id)->get(),
            'educations' => Educations::where('user_id',auth()->user()->id)->get(),
            'services' => Services::where('user_id',auth()->user()->id)->get(),
            'portfolios' => Portfolios::where('user_id',auth()->user()->id)->get(),
            'facts' => Facts::where('user_id',auth()->user()->id)->get(),
            'testimonials' => Testimonials::where('user_id',auth()->user()->id)->get(),
            'brands' => Brands::where('user_id',auth()->user()->id)->get(),
            'contact_info' => Contacts::where('user_id',auth()->user()->id)->first(),
            'city' => $city,
        ]);
    }
    public function portfolio_page($id){

        return view('frontend.portfolio')->with([
            'port' => Portfolios::where('id',$id)->first(),
        ]);
    }
    public function contact_email(Request $request){
        Mail::to($request->email)->send(new ContactsMail($request));
        Emails::create($request->except('_token')+[
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

}
