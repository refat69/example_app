<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function cPassword()
    {
        return view('admin.body.change_pass');
    }
    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedpassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('login')->with($notification);
        } else {
            $notification = array(
                'message' => 'Password Not Change',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
