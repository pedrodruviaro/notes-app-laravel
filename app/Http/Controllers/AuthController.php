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
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => 'Failed to login',
                ]);
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    public function save(Request $request): RedirectResponse
    {
        $attributes = $request->validate(
            [
                'name' => ['required', 'min:3', 'max:200'],
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required', Password::min(6), 'confirmed'],
            ]
        );

        $user = User::create($attributes);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function destroy(): RedirectResponse
    {
        $user_id = Auth::user()->id;

        User::destroy($user_id);
        Auth::logout();

        return redirect('/login');
    }
}
