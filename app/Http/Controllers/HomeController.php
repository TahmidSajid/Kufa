<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Models\Educations;
use App\Models\Socials;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home')->with([
            'socials' => Socials::where('user_id',auth()->user()->id)->get(),
        ]);
    }
    public function about_me()
    {
        $updating = false;
        $contacts = Contacts::where('user_id',auth()->user()->id)->first();
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
        ]);
    }
}
