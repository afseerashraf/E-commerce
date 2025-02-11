<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\AdminRegister;
use App\Http\Requests\admin\AdminLogin;
use Illuminate\Support\Facades\Crypt;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register(AdminRegister $request)
    {
        $admin = new Admin();
        $admin->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,

        ]);

        return redirect()->route('admin.viewLogin');
    }

    public function login(AdminLogin $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(auth()->guard('admin')->attempt($credentials))
        {
            $admin = auth()->guard('admin')->user();
            session(['admin' => $admin]);
            return view('admin.dashboard', compact('admin'));

        }
      
            return redirect()->route('admin.viewRegister');
       
    }

    public function logout(string $id)
    {
        $admin = Admin::find(Crypt::decrypt($id));
        auth()->guard('admin')->logout();
        return redirect()->route('admin.viewLogin');
    }
}
