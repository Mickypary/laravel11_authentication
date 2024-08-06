<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\WebsiteMail;
use App\Repositories\UserRepo;
// use App\Contract\UserRepositoryInterface;

class WebsiteController extends Controller
{
    // protected $user;

    public function __construct(private UserRepo $user)
    {
        $this->user = $user;
        // dd($this->user->getAllUsers());
        // dd($user);
    }

    public function index()
    {
        // dd($user->getAllUsers());
        return view('home');
    }

    public function dashboard_admin()
    {
        return view('dashboard_admin');
    }

    public function dashboard_user()
    {
        return view('dashboard_user');
    }

    public function settings()
    {
        return view('settings');
    }

    public function login()
    {
        return view('login');
    }

    public function login__(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active',
        ];

        if (Auth::attempt($credentials)) {
            if (Auth::guard('web')->user()->role == 1) {
                return redirect()->route('dashboard-admin');
            } else {
                return redirect()->route('dashboard-user');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function registration()
    {
        return view('registration');
    }

    public function registration__(Request $request)
    {
        $token = hash('sha256', time());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->role = 2;
        $user->save();

        $verification_link = url('registration/verify/' . $token . '/' . $request->email);
        $subject = 'Registration Confirmation';
        $message = 'Kindly click on this link to verify your account: <br> <a href="' . $verification_link . '">Click Here</a>';

        try {
            Mail::to($user->email)->send(new WebsiteMail($subject, $message));
            echo 'Check your inbox for a verification link';
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function verify_email($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login');
        }

        $user->status = 'Active';
        $user->token = '';
        $user->update();

        return redirect()->route('dashboard');

        // echo 'Registration verified successfully. You can now proceed to login';
    }

    public function forget_password()
    {
        return view('forget_password');
    }

    public function forget_password__(Request $request)
    {
        $token = hash('sha256', time());
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            dd('Email not found!');
        }

        $user->token = $token;
        $user->status = 'Pending';
        $user->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Kindly click on this link to reset your password: <br> <a href="' . $reset_link . '">Click Here</a>';

        try {
            Mail::to($user->email)->send(new WebsiteMail($subject, $message));
            echo 'Check your inbox for a reset link';
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function reset_password($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('reset_password', compact('token', 'email'));
    }

    public function reset_password__(Request $request)
    {
        $token = $request->token;
        $email = $request->email;

        $user = User::where('token', $token)->where('email', $email)->first();
        $user->password = Hash::make($request->new_password);
        $user->status = 'Active';
        $user->token = '';
        $user->update();

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
