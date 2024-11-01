<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
            'nim' => 'required|unique:users,nim'
        ]);

        $storedData = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'prodi' => $request->prodi,
            'semester' => $request->semester,
        ]);

        if ($storedData) {
            toast('Berhasil membuat akun, silakan masuk', 'success');
            return redirect('/login');
        } else {
            toast('Gagal membuat akun, silakan coba lagi', 'error');
            return redirect('/register');
        }
    }
}
