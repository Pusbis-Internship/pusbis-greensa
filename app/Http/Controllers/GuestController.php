<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $credentials = $request->validate([
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
    
        Guest::create([
            'username' => $credentials['username'],
            'password' => bcrypt($credentials['password']),
            'name' => $credentials[''],
            'nik' => $credentials[''],
            'telp' => $credentials[''],
            'alamat' => $credentials[''],
            'kota' => $credentials[''],
            'provinsi' => $credentials[''],
            'negara' => $credentials[''],
        ]);

        return redirect('/pelanggan/page/home')->withErrors('Account Created !!!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('guest')->attempt($credentials)) {
            $guest = Guest::where('username', $credentials['username'])->first();

            $request->session()->regenerate();
            $request->session()->put('guest', $guest);
            return redirect()->intended('/')->withErrors('Sudah Login !!!');
        }

        return back()->withErrors('Akun salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
