<?php

namespace App\Http\Controllers;

use App\Http\Requests\userLogin;
use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        if (auth()->guard('web')->attempt($credentials)) {
            $user = auth()->guard('web')->user();
            session(['user_id' => $user->id]);

            return redirect()->route('products.home')->with('user', $user);
        }

        return redirect()->route('user.viewRegister');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('user.viewLogin');
    }
}
