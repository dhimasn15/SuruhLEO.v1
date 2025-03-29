<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class SesiController extends Controller
{
    public function index()
    {
        return view('input_form/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
    
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
    
        if (Auth::attempt($infologin)) {
            // Ambil user yang login
            $users = Auth::user();
    
            // Jika email adalah admin@gmail.com, redirect ke halaman input_form
            if ($users->email === 'admin@gmail.com') {
                return redirect('/input_form')->with('login_success', 'Selamat datang, Admin!');
            } 
            
            // Jika role adalah admin, redirect ke halaman dashboard admin
            else if ($users->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('login_success', 'Selamat datang, Admin!');
            } 
            
            // Jika role adalah user, redirect ke home
            else if ($users->role === 'user') {
                return redirect()->route('input_form.home')->with('login_success', 'Selamat datang, Anda berhasil login!');
            }
    
            // Jika peran tidak dikenali, logout
            Auth::logout();
            return redirect()->route('login')->with('error', 'Peran tidak dikenali.');
        } else {
            // Jika login gagal
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }
    


    public function logout()
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('input_form.home')->with('goodbye', 'Selamat Tinggal! Semoga hari Anda menyenankan."kata Leo"');}


    public function showLoginForm()
    {
        return view('input_form/login'); // Sesuaikan dengan path view login kamu.
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Opsional jika ingin memastikan default role
        ]);

        return redirect()->route('input_form.home')->with('daftar', 'Pendaftaran berhasil! Silakan login.');

        if ($user->isAdmin()) {
        return redirect('/input_form'); // Redirect admin ke halaman input_form
    }

    return redirect('/home'); // Redirect user biasa ke halaman home
    }

}
