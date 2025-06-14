<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Preference;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Pastikan ada preference untuk user yang login
        $preference = Preference::where('user_id', auth()->id())->first();

        // Jika preference tidak ditemukan, redirect dengan pesan error
        if (!$preference) {
            return redirect()->back()->withErrors(['max_users' => 'Preference tidak ditemukan.']);
        }

        // Ambil max_users dari preference user yang login
        $maxUsers = $preference->max_users;

        // Periksa apakah jumlah user yang terdaftar sudah mencapai max_users
        if (User::count() >= $maxUsers) {
            return redirect()->back()->withErrors(['max_users' => 'Jumlah pengguna telah mencapai batas maksimum.']);
        }

        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Menyimpan pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Akun Anda telah berhasil dibuat. Silakan login.');
    }
}
