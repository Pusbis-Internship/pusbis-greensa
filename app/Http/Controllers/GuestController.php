<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Guest;
use App\Models\Train;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\TrainFacility;
use App\Models\LayoutModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class GuestController extends Controller
{

    public function showhome()
    {
        return view('pelanggan.page.home', ['title' => 'Home']);
    }

    public function showhotel()
    {
        return view('pelanggan.page.hotel', ['title' => 'Hotel']);
    }

    public function showabout()
    {
        return view('pelanggan.page.about', ['title' => 'About']);
    }

    public function showlogin()
    {
        return view('pelanggan.page.login', ['title' => 'Login']);
    }

    public function showregister()
    {
        return view('pelanggan.page.register', ['title' => 'Register']);
    }

    public function showdetail_tc($id)
    {
        $train = Train::findOrFail($id);
        $facilities = TrainFacility::all();  // Misalnya, Anda dapat mengganti ini sesuai dengan kebutuhan
        $layout_models = LayoutModels::where('train_id', $id)->get(); // Misalnya, Anda dapat mengganti ini sesuai dengan kebutuhan

        return view('pelanggan.page.detail_tc', [
            'title' => 'Detail Training Center',
            'train' => $train,
            'facilities' => $facilities,
            'layout_models' => $layout_models
        ]);
    }

    public function showcart()
    {
        $cart = Cart::all();
        $cartItems = CartItem::all();

        return view('pelanggan.page.cart', [
            'title' => 'Keranjang',
            'cart' => $cart,
            'cartItems' => $cartItems
        ]);
    }

    public function showtrain()
    {
        $trains = Train::with('layout_models')->get();
        $facilities = TrainFacility::all();

        return view('pelanggan.page.train', [
            'title' => 'Training Center',
            'trains' => $trains,
            'facilities' => $facilities,
        ]);
    }

    public function search(Request $request)
    {
        $lantai = $request->lantai;
        $peserta = $request->peserta;

        $query = Train::query();

        if ($lantai !== "Semua Lantai") {
            $query->where('lantai', $lantai);
        }

        if ($peserta !== null) {
            $query->where('kap_teater', '>', $peserta);
        }

        $trains = $query->get();
        $facilities = TrainFacility::all();

        return view('pelanggan.page.train', [
            'title' => 'Training Center',
            'trains' => $trains,
            'facilities' => $facilities
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

        Cart::create([
            'guest_id' => $guest->id,
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
