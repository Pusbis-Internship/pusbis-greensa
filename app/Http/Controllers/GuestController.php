<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function register(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|min:6|max:255|email',
            'password' => 'required|min:5|max:255',
            'name' => 'required',
            'nik' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'negara' => 'required'
        ]);

        $store = [
            'username' => $validate['username'],
            'password' => Hash::make($validate['password']), // Hash the password using bcrypt
            'name' => $validate['name'],
            'nik' => $validate['nik'],
            'telp' => $validate['telp'],
            'alamat' => $validate['alamat'],
            'kota' => $validate['kota'],
            'provinsi' => $validate['provinsi'],
            'negara' => $validate['negara'],
        ];
        
        Guest::create($store);

        return $store;
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // if (Auth::guard('admin')->attempt($validate)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }

        return view('pelanggan.page.home2');
    }
}
