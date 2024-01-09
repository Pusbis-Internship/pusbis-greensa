<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{

    public function showhome()
    {return view('pelanggan.page.home', ['title' => 'Home']);}

    public function showhotel()
    {return view('pelanggan.page.hotel', ['title' => 'Hotel']);}

    public function showtrain()
    {return view('pelanggan.page.train', ['title' => 'Training Center']);}

    public function showabout()
    {return view('pelanggan.page.about', ['title' => 'About']);}

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
