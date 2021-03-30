<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');
        return view('admin.admin_dashboard');
    }

    public function login(Request $request)
    {
        // code for login admin
        if ($request->isMethod('post')) {
            $data = $request->all();

            $validateData =  $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required'
            ]);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/dashboard');
            } else {
                session()->flash('error_login', 'invalid email or password');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }

    // funtion for logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    // function for check current pwd
    public function checkCurrentPwd(Request $request)
    {
        $data = $request->all();
        $user = Auth::guard('admin')->user()->password;
        // echo "<pre>";
        // print_r($user);
        // die;
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
}