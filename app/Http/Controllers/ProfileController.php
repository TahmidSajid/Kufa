<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile_image(Request $request){

        $request->validate([
            'profile_image' => 'file|required',
        ]);

        if(auth()->user()->profile_image){
            unlink(base_path('public/uploads/profile_photos/'.auth()->user()->profile_image));
        }
        $new_image = auth()->user()->id.time().".".$request->file('profile_image')->getClientOriginalExtension();
        $image = Image::make($request->file('profile_image'))->resize(300,200);
        $image ->save(base_path('public/uploads/profile_photos/'.$new_image),80);
        User::find(auth()->user()->id)->update([
            'profile_image' => $new_image,
        ]);
        return back()->with('alerting','Profile picture updated');
    }
    public function password_change(Request $request){

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required_with:password',
        ]);
        if(Hash::check($request->old_password,auth()->user()->password)){
            User::find(auth()->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
        }
        return back()->with('alerting','Password Changed');
    }
}
