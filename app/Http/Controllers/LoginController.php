<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form for the admin.
     */
    public function index()
    {
        return view('admin.admin_login');
    }

    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        // Validate input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt login using admin guard
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect()->route('admin.home')
                ->with('success', 'You have successfully logged in!');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show the admin home page.
     */
    public function home()
    {
        return view('admin.home');
    }

    public function slider ()
    {
        return view('admin.slider');
    }

    /**
     * Show the admin logout page.
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')
            ->with('success', 'You have successfully logged out!');
    }
}
