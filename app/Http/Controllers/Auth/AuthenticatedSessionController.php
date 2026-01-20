<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => ['required', 'string'], // kita pakai field email sebagai "login"
        'password' => ['required', 'string'],
    ]);

    $login = $request->email;
    $password = $request->password;

    /*
     | LOGIN SISWA (NISN)
     */
    $student = \App\Models\Student::where('nisn', $login)->first();
    if ($student && \Illuminate\Support\Facades\Hash::check($password, $student->user->password)) {
        Auth::login($student->user);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    /*
     | LOGIN ADMIN / TENANT
     */
    $user = \App\Models\User::where('username', $login)
        ->orWhere('email', $login)
        ->first();

    if ($user && \Illuminate\Support\Facades\Hash::check($password, $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    throw ValidationException::withMessages([
        'email' => __('auth.failed'),
    ]);
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
