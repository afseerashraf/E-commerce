<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\AdminRegister;
use App\Http\Requests\admin\AdminLogin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register(AdminRegister $request)
    {
        $admin = new Admin();

       
        $input = [

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
           
        ];

        if($request->hasfile('image')){
            
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('uploads/images', $request->image, $fileName);
            $input['image'] = $fileName;
        }

        $admin->create($input);

        return redirect()->route('admin.viewLogin');
    }

    public function login(AdminLogin $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(auth()->guard('admin')->attempt($credentials))
        {
            $admin = auth()->guard('admin')->user();
            session(['admin' => $admin]);
            return view('admin.profile', compact('admin'));
            

        }
      
            return redirect()->route('admin.viewRegister');
       
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function logout(string $id)
    {
        $admin = Admin::find(Crypt::decrypt($id));
        auth()->guard('admin')->logout();
        return redirect()->route('admin.viewLogin');
    }
}
