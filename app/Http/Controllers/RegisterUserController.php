<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(){

        return view('auth.register');
    }

    public function store(){
        // dd(request()->all());

        //validate
        try{
        $validated = request()->validate([
            'first_name'=> ['required'],
            'last_name'=>['required'],
            'email'=>['required','email','max:254'],
            'password'=>['required',Password::min(6), 'confirmed']  //also look for password_confirmation

        ]);}
        catch(\Exception $e){
            dd($e->getMessage());
        }

        // dd($validated);


        // create the user
        $user = User::create($validated);

        //log in
        Auth::login($user);

        //redirect somewhere
        return redirect('/jobs');
    }
}
