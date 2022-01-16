<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.view_profile', compact('user'));
    }
    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.profile.edit_profile', compact('user'));
    }
    public function ProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->status = $request->status;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/user_images/'.$user->image));
            $fileName = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/user_images'), $fileName);
            $user->image = $fileName;
        }
        $user->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordView()
    {
        return view('backend.profile.change_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $dataValidation = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            
            return redirect()->route('login');
            
        }else{
            return redirect()->back()->with('error', 'Old Password Not Match');
        }     
    }
}
