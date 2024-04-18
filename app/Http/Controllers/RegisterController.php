<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pencaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'noktp' => 'required|max:20',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        // Simpan data pendaftaran ke dalam tabel 'users'
        $user = User::create($validateData);

        // Buat data pencaker dengan menggunakan 'noktp' sebagai kunci penghubung
        $pencakerData = [
            'noktp' => $validateData['noktp'],
            'nama' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
            // Tambahkan kolom lain yang diperlukan dalam tabel 'pencaker'
        ];
        $user->pencaker()->create($pencakerData);

        // Redirect ke halaman login dengan pesan sukses
        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
