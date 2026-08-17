<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Menampilkan halaman Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Registrasi
    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'invite_code' => 'required|string'
        ]);

        // Pengecekan Invite Code
        if ($request->invite_code !== 'SEPUH2026') {
            return back()->withErrors(['invite_code' => 'Kode Undangan tidak valid atau kadaluarsa!'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
            'invite_code' => $request->invite_code,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Berhasil bergabung ke markas!');
    }

    // Proses Login
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah nih, sepuh.',
        ])->withInput();
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}