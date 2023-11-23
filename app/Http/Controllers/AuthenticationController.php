<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function showLogin () {
        return view('login');
    }
    public function showRegistration () {
        return view('registration');
    }

    public function login (Request $request) {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return to_route('topic.index');
        }
        return back()->withErrors([
            'email' => 'The given email is not valid!',
            'password' => 'The given password is not correct!'
        ]);
    }

    public function registration (Request $request) {
        $request->validate([
            'email' => ['required'],
            'name' => ['required'],
            'password' => ['required'],
            'terms&services' => ['accepted']
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        $user->save();

        if(!$user) {
            return back()->withErrors([
                'email' => 'The given email is not valid!',
                'name' => 'The given username is not correct! (Maximum 50 character)',
                'password' => 'The given email is not correct!',
                'terms&services' => 'Please accept our terms and services.'
            ]);
        }

        return to_route('topic.index');
    }

    public function logout (){
        Session::flush();
        Auth::logout();

        return to_route('login');
    }
}
