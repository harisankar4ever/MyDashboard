<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        return view('dashboard.layouts.index');
    }
    public function settings()
    {
        return view('dashboard.user.edit', array('user'=>Auth::user()));
    }
    public function uploadAvatar(Request $request, User $user)
    {
        $user = User::find($request->id);

        if($request->hasfile('Avatar')){

            $avatar = $request->file('Avatar');
            $extension = $avatar->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            // Image::make($avatar)->resize(300,300)->save(public_path('uploads/userAvatar/',$filename ));
            // $this->deleteOldImage();
            $avatar->move('uploads/userAvatar/', $filename);
            $user = Auth::user();
            $user->avatar = $filename;
        } else {
            return $request;
            $user->avatar = 'uploads/userAvatar/default.jpg';
        }
        $user->save();
        return view('dashboard.user.edit', array('user'=>Auth::user(), 'success', 'Your Avatar Successfully Updated'));



    }
    public function changePassword(Request $request, User $user)
    {

        if(!(Hash::check($request->get('current_password'), Auth::user()->password))){
            return back()->with('error', 'your current password does not match with what you provided');
        }
        if(strcmp($request->get('current_password'), $request->get('new_password'))==0){
            return back()->with('error', 'your current password cannot be same with new password');
        }

        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|string|min:8|confirmed'
        // ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        // dd($user);
        return back()->with('message', 'your password changed successfully');

    }
}
