<?php

namespace App\Http\Controllers;

use App\Http\Requests\userLogin;
use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function register(userRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    

       return redirect()->route('user.viewLogin');
    }
    public function login(userLogin $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if(auth()->attempt($credentials))
        {
            return view('home');
        }
      
            return redirect()->route('user.viewRegister');
       
    }
}
