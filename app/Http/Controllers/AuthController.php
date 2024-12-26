<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function login_user(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required'],
            ]
        );

        if (!Auth::attempt($credentials)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Login failed. Please check your credentials.',
                ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/')->with('success', 'Welcome back!'); // msg can be used to show a toast notification
    }

    public function register_user(Request $request): RedirectResponse
    {
        $attributes = $request->validate(
            [
                'name' => ['required', 'min:3', 'max:200'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', Password::min(6), 'confirmed'],
            ]
        );

        $user = User::create($attributes);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Account created successfully!'); // msg can be used to show a toast notification
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out!'); // msg can be used to show a toast notification
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function destroyAccount(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->withErrors(['error' => 'You need to be logged in to delete your account.']);
        }

        $user->delete();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Your account has been removed!');
    }
}
