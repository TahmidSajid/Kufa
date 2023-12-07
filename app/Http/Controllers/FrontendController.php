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
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function fronend_page(){
        if(Auth::check()){

            $banner = Banners::where('user_id',auth()->user()->id)->where('status','active')->get();
            $socials = Socials::where('user_id',auth()->user()->id)->get();
            $educations = Educations::where('user_id',auth()->user()->id)->get();
            $services = Services::where('user_id',auth()->user()->id)->get();
            $portfolios = Portfolios::where('user_id',auth()->user()->id)->get();
            $facts = Facts::where('user_id',auth()->user()->id)->get();
            $testimonials = Testimonials::where('user_id',auth()->user()->id)->get();
            $brands = Brands::where('user_id',auth()->user()->id)->get();
            $contact_info = Contacts::where('user_id',auth()->user()->id)->first();
            if($contact_info){
            $city = explode(",",$contact_info->address)[1];
            }
            else{
                $city = false;
            }
            if($banner && $socials && $educations && $services && $portfolios && $facts && $testimonials && $brands && $contact_info)
            return view('frontend.index',compact(['banner','socials','educations','services','portfolios','facts','testimonials','brands','contact_info','city']))->with([
            ]);
            else{
                return redirect(route('home'))->with('login_alert','Need to fill out all the information first');
            }
        }
        else{
            return redirect(route('login'));
        }

    }
    public function portfolio_page($id){

        return view('frontend.portfolio')->with([
            'port' => Portfolios::where('id',$id)->first(),
        ]);
    }
    public function contact_email(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'message'=> 'required',
        ]);
        Mail::to($request->email)->send(new ContactsMail($request));
        Emails::create($request->except('_token')+[
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

}
