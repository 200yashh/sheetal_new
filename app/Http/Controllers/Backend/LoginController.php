<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public $_viewPrefix = "backend.auth.";
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view($this->_viewPrefix . 'login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->only('remember');

        $user = User::where('email', $request->only('email'))->first();

        $err_message = 'The provided credentials do not match our records.';

        if (isset($user) && Auth::attempt($credentials, $remember)) {
            if ($user->is_active !== 1) {
                $this->unauthenticate($request);
                $err_message = 'Your account is not active. Please contact support.';
            } else {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard')->with('status', 'success');
            }
        }


        return back()->withErrors([
            'email' => $err_message,
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->unauthenticate($request);
        return redirect()->route('login');
    }

    public function unauthenticate($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
