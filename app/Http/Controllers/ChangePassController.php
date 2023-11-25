<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function CPassword()
    {
        return view('admin.body.change_pass');
    }
    public function UpdatePassword(Request $request)
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
            return Redirect()->route('login')->with('success', 'Password Update Successfully');
        } else {
            return Redirect()->back()->with('error', 'Password not Update');
        }
    }
}
