<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            session()->flash('error', 'Your email invalid!');
            return redirect()->back();
        }else {
            if(!password_verify($request->password, $admin->password)){
                session()->flash('error', "Your password don't match! ");
                return redirect()->back();
            } else {
                session()->put('adminId', $admin->id);
                session()->put('adminName', $admin->name);
                return redirect('/admin/dashboard');
            }
        }
    }

    public function dashboard()
    {
        return view('backend.home.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/admin/login');
    }
}
