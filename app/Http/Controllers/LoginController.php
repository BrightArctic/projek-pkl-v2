<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function login()
    {
        return view('/dashboard-general-dashboard');
    }

    public function loginproses(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the user is currently locked out
        if (Session::has('lockout_until') && now()->lt(Session::get('lockout_until'))) {
            $lockoutDuration = Session::get('lockout_until')->diffInSeconds(now());
            return redirect()->back()->withErrors(['error' => 'Too many login attempts. Please try again after ' . $lockoutDuration . ' seconds.']);
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Session::put('name', $user->name);
            return redirect('/dashboard-general-dashboard');
        } else {
            // Increment failed login attempts
            $failedAttempts = Session::get('failed_login_attempts', 0);
            $failedAttempts++;

            // Lockout the user for 1 minute after 3 failed attempts
            if ($failedAttempts >= 3) {
                Session::put('lockout_until', now()->addMinutes(1));
                Session::forget('failed_login_attempts');
                return redirect()->back()->withErrors(['error' => 'Too many login attempts. Please try again later.']);
            }

            Session::put('failed_login_attempts', $failedAttempts);
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('pages.auth-register');
    }

    public function registeruser(Request $request){
        user::create([
            'name' => $request->name,
            'nim' => $request->nis,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'expired_at' => Carbon::now()->addMonths(6),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/auth-login2');
        $validator = Validator::make($input, $rules);
    }

    // recaptcha
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required|string|confirmed', Password::min(8)->mixedCase()],
            'password_confirmation'=> ['required_with:password|same:password|min:8'],
            'captcha' => ['required','captcha'],
        ]);
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/auth-login2')->with('logout','logout success!!');
    }
}
