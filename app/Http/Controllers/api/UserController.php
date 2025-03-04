<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use  Laravel\Sanctum\NewAccessToke;

class UserController extends Controller
{
    public function Login(Request $request)
    {
      $user = User::where('email', $request->email)->first();
      if(Hash::check($request->password, $user->password))
      {
       $token = $user->createToken('mobile-app')->plainTextToken;

       return response()->json([
        'email' => $request->email,
        'password' => $request->password,
        'data' => $token,
        'message' => 'The credentials are valid, Login Success',
        'status' => 200,
       ]);
      }else{
        return response()->json([
            'email' => $request->email,
            'password' => $request->password,
            'message' => 'The Password is invalid',
            'status' => '250',
        ]);
      }
    }

    public function Users(Request $request)
    {
        $users = User::all();
        return $users;
    }

    public function logOut()
    {
        $userID = auth()->guard('web')->id();
        $user = User::find($userID);
        $user->tokens()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User loggeout Succesfully',
        ]);
    }

    public function edit(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update([
            
            'name' => $request->name,
            
        ]);
    }
}
