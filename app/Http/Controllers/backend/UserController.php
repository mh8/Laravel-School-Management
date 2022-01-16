<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView()
    {
        $users = User::all();
        return view('backend.user.view_user', compact('users'));
    }

    public function UserCreate()
    {
        return view('backend.user.create_user');
    }

    public function UserStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|confirmed',
            'usertype' => 'required',
        ]);

        $user = new User();
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserEdit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit_user', compact('user'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'usertype' => 'required',
        ]);

        $user = User::find($id);
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = bcrypt($request->password);

        $user->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('user.view')->with($notification);
    }
}
