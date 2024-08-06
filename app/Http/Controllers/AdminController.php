<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function login__(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin_dashboard');
        } else {
            return redirect()->route('admin_login');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_dashboard');
    }
}
