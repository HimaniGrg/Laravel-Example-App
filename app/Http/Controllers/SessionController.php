<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        // dd(request()->all());

        //validate
        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        // attempt to login the user
        if(! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email'=>'Sorry, the credentials do not match.'
            ]);
        }
        
        //login
        request()->session()->regenerate();

        //redirect
        return redirect('/');
    }

    public function destory(){
        // dd('Log the user out');
        Auth::logout();

        return redirect('/');
    }
}
