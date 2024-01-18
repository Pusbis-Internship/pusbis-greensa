<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class GuestController extends Controller
{

    public function showhome()
    {return view('pelanggan.page.home', ['title' => 'Home']);}

    public function showhotel()
    {return view('pelanggan.page.hotel', ['title' => 'Hotel']);}

    public function showabout()
    {return view('pelanggan.page.about', ['title' => 'About']);}

    public function showlogin()
    {return view('pelanggan.page.login', ['title' => 'Login']);}

    public function showregister()
    {return view('pelanggan.page.register', ['title' => 'Register']);}

    public function showdetail_tc()
    {return view('pelanggan.page.detail_tc', ['title' => 'Detail-TC']);}

    public function showtrain()
    {
        $trains = Train::all();
        
        return view('pelanggan.page.train', [
            'title' => 'Training Center',
            'trains' => $trains
        ]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:4|max:255|email',
            'password' => 'required|min:8|max:255',
            'name' => 'required',
            'nik' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'tanggallahir' => 'required'
        ]);
    
        $guest = Guest::create([
            'username' => $credentials['username'],
            'email' => $credentials['username'],
            'password' => bcrypt($credentials['password']),
            'name' => $credentials['name'],
            'nik' => $credentials['nik'],
            'telp' => $credentials['telp'],
            'alamat' => $credentials['alamat'],
            'kota' => $credentials['kota'],
            'provinsi' => $credentials['provinsi'],
            'negara' => $credentials['negara'],
            'tanggallahir' => $credentials['tanggallahir'],
        ]);

        // kirim email
        event(new Registered($guest));

        // login
        Auth::guard('guest')->login($guest);

        // redirect
        $request->session()->regenerate();
        $request->session()->put('guest', $guest);
        return redirect('/email/verify');

        // return redirect('/login')->withErrors('Akun berhasil dibuat !!!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $guest = Guest::where('username', $credentials['username'])->first();
    
        if (!$guest) {
            return redirect()->back()->withErrors(['username' => 'Email belum terdaftar']);
        }
    
        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('guest', $guest);
            return redirect()->intended('/')->withErrors('Sudah Login !!!');
        }
    
        return redirect()->back()->withErrors(['password' => 'Password salah']);
    }

    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
