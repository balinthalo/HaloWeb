<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile (Request $request)
    {
        return view('users.profile')->with('user', $request->user());
    }

    public function email ()
    {
        return view('users.email');
    }

    public function password ()
    {
        return view('users.password');
    }

    public function show (Request $request)
    {
        return view('users.dashboard')->with([
            'user' => $request->user()
        ]);
    }

    public function update_profile (Request $request) {
        $request->validate([
            'image' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();

        $user = User::find(auth()->user()->id);
        $user->profile_picture = $imageName;
        $user->save();

        $request->image->move(public_path('images'), $imageName);

        return back()->with('succes', 'Image uploaded Successfully!')->with('image', $imageName);
    }
}
