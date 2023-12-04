<?php

namespace App\Http\Controllers;

use App\Models\Educations;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edu_description(Request $request){
        $request->validate([
            'edu_description' => 'required'
        ]);
        User::find(auth()->user()->id)->update([
            'introduction' => $request->edu_description,
        ]);
        return back();
    }

}
