<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Guest;
use App\Models\Order;
use App\Models\Train;
use App\Models\CartItem;
use App\Models\LayoutModels;
use Illuminate\Http\Request;
use App\Models\TrainFacility;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class GuestController extends Controller
{
    public function showchangepw()
    {
        return view('pelanggan.page.changepw', ['title' => 'change password']);
    }

    public function showhotel()
    {
        return view('pelanggan.page.hotel', ['title' => 'Hotel']);
    }

    public function showabout()
    {
        // $cartItemCount = $cart->items->count();

        return view('pelanggan.page.about', [
            'title' => 'About'
        ]);
    }

    public function showpackage()
    {
        return view('pelanggan.page.package', ['title' => 'package']);
    }

    public function showlogin()
    {
        return view('pelanggan.page.login', ['title' => 'Login']);
    }

    public function showregister()
    {
        return view('pelanggan.page.register', ['title' => 'Register']);
    }

    public function showforgotpw()
    {

        return view('pelanggan.page.forgotpw', ['title' => 'forgot password']);
    }

    public function showResetPW($token)
    {
        // Anda dapat menambahkan logika verifikasi tautan reset password di sini
        $title = 'Reset Password'; // Judul untuk halaman reset password
        return view('pelanggan.page.resetpassword', compact('token', 'title'));
    }



    public function forgetpassword(Request $request)
    {
        // Lakukan validasi terlebih dahulu
        $request->validate(['email' => 'required|email']);

        // Generate token baru
        $token = Str::random(64);

        // Cek apakah ada token lama untuk pengguna dengan email yang sama
        $existingToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        // Jika ada, perbarui token yang ada dengan token baru
        if ($existingToken) {
            DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->update([
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
        } else {
            // Jika tidak ada, tambahkan token baru ke database
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        }

        // Kirim email dengan token reset password
        Mail::send('pelanggan.auth.resetpassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        // Setelah email terkirim, redirect kembali ke halaman forgot password dengan pesan sukses
        return redirect('/forgot-password')->with('status', 'send email success');
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:1|confirmed', // tambahkan aturan 'confirmed' untuk memastikan password cocok dengan konfirmasi password
            'token' => 'required'
        ]);

        $updatePassword = Db::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$updatePassword || Carbon::parse($updatePassword->created_at)->addMinutes(1)->isPast()) {
            // Redirect kembali ke halaman reset password dengan pesan error
            return redirect("/forgot-password")->with('error', 'Token kadaluarsa, mohon kirim ulang email anda');
        }

        Db::table('guests')
            ->where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);


        Db::table('password_reset_tokens')
            ->where('email', $updatePassword->email)
            ->delete();

        // Umpan balik kepada pengguna
        return redirect('/login')->with('status', 'Password successfully reset!');
    }

    public function showhome()
    {
        $currentDate = Carbon::now()->addDay();
        // $cart = Cart::where('guest_id', auth('guest')->id())->first();
        // $cartItemCount = $cart->items->count();

        return view('pelanggan.page.home', [
            'title'         => 'Home',
            'currentDate'   => $currentDate,
            // 'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showprofile()
    {
        // Ambil data pengguna dari database
        $guest = Guest::find(auth('guest')->id());

        // Tampilkan view untuk form edit profil dan teruskan data pengguna
        return view('pelanggan.page.profile', [
            'title' => 'Home',
            'guest' => $guest
        ]);
    }

    public function updateprofile(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'negara' => 'required|string|max:255',
            'tanggallahir' => 'required|date|max:255',
        ]);

        // Temukan data pengguna berdasarkan ID yang diberikan
        $guest = Guest::find($id);

        if (!$guest) {
            return redirect('/profile')->with('error', 'Data pengguna tidak ditemukan');
        }

        // Simpan data yang diperbarui ke dalam database
        $guest->name = $request->input('name');
        $guest->nik = $request->input('nik');
        $guest->telp = $request->input('telp');
        $guest->alamat = $request->input('alamat');
        $guest->kota = $request->input('kota');
        $guest->provinsi = $request->input('provinsi');
        $guest->negara = $request->input('negara');
        $guest->tanggallahir = $request->input('tanggallahir');
        // Simpan kolom-kolom lainnya sesuai kebutuhan
        $guest->save();

        return redirect('/profile')->with('success', 'Data pengguna berhasil diperbarui');
    }

    public function changePassword(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:1|confirmed',
        ]);

        $guest = Guest::find(auth('guest')->id());

        // Verifikasi kata sandi saat ini
        if (!Hash::check($request->input('current_password'), $guest->password)) {
            return redirect('/change-password')->with('error', 'Kata Sandi Saat Ini Salah');
        }

        // Simpan kata sandi baru ke dalam database
        $guest->password = Hash::make($request->input('new_password'));
        $guest->save();

        return redirect('/profile')->with('success', 'Kata Sandi Berhasil Diubah');
    }

    public function showdetail_tc($id)
    {
        $train = Train::findOrFail($id);
        $facilities = TrainFacility::all();  // Misalnya, Anda dapat mengganti ini sesuai dengan kebutuhan
        $layout_models = LayoutModels::where('train_id', $id)->get(); // Misalnya, Anda dapat mengganti ini sesuai dengan kebutuhan
        $currentDate = Carbon::now()->addDay();

        return view('pelanggan.page.detail_tc', [
            'title' => 'Detail Training Center',
            'train' => $train,
            'facilities' => $facilities,
            'currentDate'  => $currentDate,
            'layout_models' => $layout_models
        ]);
    }

    public function showcart()
    {
        $guest = Guest::find(auth('guest')->id());
        $cart = Cart::all();
        $cartItems = CartItem::all();

        return view('pelanggan.page.cart', [
            'title'     => 'Keranjang',
            'guest'     => $guest,
            'cart'      => $cart,
            'cartItems' => $cartItems,
        ]);
    }

    public function addToCart(Request $request)
    {
        $checkin = $request->checkin;
        $lamaHari = $request->lamaHari;
        $checkout = date('Y-m-d', strtotime($checkin . ' + ' . ($lamaHari - 1) . ' days'));

        CartItem::create([
            'cart_id'       => $request->cart_id,
            'train_id'      => $request->train_id,
            'layout'        => $request->layout,
            'checkin'       => $request->checkin,
            'checkout'      => $checkout,
            'lama'          => $request->lamaHari,
            'kapasitas'     => $request->kapasitas,
            'harga'         => $request->harga,
            'nama_kegiatan' => $request->namaKegiatan,
            'special'       => $request->special,
        ]);

        return redirect('/training-center')->withErrors(['successAddToCart' => 'Berhasil menambahkan ke cart']);
    }

    public function cartItemDelete($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return redirect('/cart')->withErrors(['successAddToCart' => 'Berhasil menghapus item']);
    }

    public function showtrain()
    {
        $cart = Cart::find(auth('guest')->id());
        $facilities = TrainFacility::all();
        $currentDate = Carbon::now()->addDay();

        // Get Trains
        $query = Train::query();
        $dateIn = Carbon::tomorrow();
        $dateOut = Carbon::tomorrow();;

        if (Auth::guard('guest')->check()) {
            // function to get from CartItem where 'checkin' and 'checkout' is not overlapping with $date and $dateOut
            $bookedRooms = CartItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('cart_id', '=', auth('guest')->id());
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->pluck('train_id')
                ->toArray();

            $query->whereNotIn('id', $bookedRooms);
        }

        $trains = $query->get();

        return view('pelanggan.page.train', [
            'title'        => 'Training Center',
            'trains'       => $trains,
            'facilities'   => $facilities,
            'currentDate'  => $currentDate,
            'cart'         => $cart,
        ]);
    }

    public function search(Request $request)
    {
        $cart = Cart::find(auth('guest')->id());
        $currentDate = Carbon::now()->addDay();

        $lantai = $request->lantai;
        $peserta = $request->peserta;
        $dateIn = $request->dateIn;
        $lama = $request->lama;
        $dateOut = date('Y-m-d', strtotime($dateIn . ' + ' . ($lama - 1) . ' days'));

        $query = Train::query();

        if ($lantai !== "Semua Lantai") {
            $query->where('lantai', $lantai);
        }

        if ($peserta !== null) {
            $query->where('kap_teater', '>', $peserta);
        }

        if (Auth::guard('guest')->check()) {
            // function to get from CartItem where 'checkin' and 'checkout' is not overlapping with $date and $dateOut
            $bookedRooms = CartItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('cart_id', '=', auth('guest')->id());
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('cart_id', '=', auth('guest')->id());
                })
                ->pluck('train_id')
                ->toArray();

            $query->whereNotIn('id', $bookedRooms);
        }

        $trains = $query->get();
        $facilities = TrainFacility::all();

        return view('pelanggan.page.train', [
            'title'         => 'Training Center',
            'trains'        => $trains,
            'facilities'    => $facilities,
            'currentDate'   => $currentDate,
            'cart'          => $cart,
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

    public function showorder()
    {
        $orders = Order::where('guest_id', auth('guest')->id())->get();

        return view('pelanggan.page.order', [
            'title' => 'Order',
            'orders' => $orders,
        ]);
    }

    public function showcheckout()
    {
        $cart = Cart::find(auth('guest')->id());

        return view('pelanggan.page.checkout', [
            'title' => 'Checkout',
            'cart' => $cart,
        ]);
    }

    public function checkoutKomplimen($id)
    {
        $cart = Cart::find($id);

        foreach ($cart->items as $item) {
            Order::create([
                'guest_id'      => $cart->guest->id,
                'train_id'      => $item->train_id,
                'layout'        => $item->layout,
                'checkin'       => $item->checkin,
                'checkout'      => $item->checkout,
                'lama'          => $item->lama,
                'kapasitas'     => $item->kapasitas,
                'harga'         => $item->harga,
                'nama_kegiatan' => $item->nama_kegiatan,
                'special'       => $item->special,
                'status'        => 'Pending',
                'surat'         => 'SuperSemar.pdf',
            ]);
        }

        CartItem::where('cart_id', $id)->delete();

        return redirect('/order');
    }

    public function checkoutReguler($id)
    {
        $cart = Cart::find($id);

        foreach ($cart->items as $item) {
            Order::create([
                'guest_id'      => $cart->guest->id,
                'train_id'      => $item->train_id,
                'layout'        => $item->layout,
                'checkin'       => $item->checkin,
                'checkout'      => $item->checkout,
                'lama'          => $item->lama,
                'kapasitas'     => $item->kapasitas,
                'harga'         => $item->harga,
                'nama_kegiatan' => $item->nama_kegiatan,
                'special'       => $item->special,
                'status'        => 'Pending',
                'surat'         => 'SuperSemar.pdf',
            ]);
        }

        CartItem::where('cart_id', $id)->delete();

        return redirect('/order');
    }

    public function invoiceShow($id)
    {
        $orders = Order::where('id', $id)->get();
        $namaKegiatan = Order::where('id', $id)->value('nama_kegiatan');
        $totalHarga = Order::where('id', $id)
                      ->where('status', 'Acc')
                      ->sum('harga');

        return view('pelanggan.layout.invoice', [
            'orders' => $orders,
            'namaKegiatan' => $namaKegiatan,
            'totalHarga' => $totalHarga,
        ]);
    }

    public function invoiceDownload($id)
    {
        $orders = Order::where('id', $id)->get();
        $namaKegiatan = Order::where('id', $id)->value('nama_kegiatan');

        $pdf = PDF::loadView('pelanggan.layout.invoice', compact('orders'));
        $pdf->setPaper('A4','landscape');
    }
}
