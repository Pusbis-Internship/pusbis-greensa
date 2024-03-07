<?php

namespace App\Http\Controllers;

use App\Mail\notifOrderMasuk;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Guest;
use App\Models\Order;
use App\Models\Train;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Models\LayoutModels;
use Illuminate\Http\Request;
use App\Models\TrainFacility;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

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
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        return view('pelanggan.page.about', [
            'title'         => 'About',
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showpackage()
    {
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        return view('pelanggan.page.package', [
            'title'         => 'package',
            'cartItemCount' => $cartItemCount,
        ]);
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

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        return view('pelanggan.page.home', [
            'title'         => 'Home',
            'currentDate'   => $currentDate,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showprofile()
    {
        // Ambil data pengguna dari database
        $guest = Guest::find(auth('guest')->id());

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // Tampilkan view untuk form edit profil dan teruskan data pengguna
        return view('pelanggan.page.profile', [
            'title' => 'Home',
            'guest' => $guest,
            'cartItemCount' => $cartItemCount,
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

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        return view('pelanggan.page.detail_tc', [
            'title' => 'Detail Training Center',
            'train' => $train,
            'facilities' => $facilities,
            'currentDate'  => $currentDate,
            'layout_models' => $layout_models,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showcart()
    {
        $guest = Guest::find(auth('guest')->id());
        $currentDate = Carbon::now()->toDateString();

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // Delete item yang tanggalnya <= hari ini
        CartItem::where('cart_id', $guest->id)
            ->where('checkin', '<=', $currentDate)
            ->delete();

        return view('pelanggan.page.cart', [
            'title'     => 'Keranjang',
            'guest'     => $guest,
            'cartItemCount' => $cartItemCount,
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
            'harga'         => $request->harga,
            'special'       => $request->special,
        ]);

        notify()->success('Berhasil menambahkan ke cart');

        return redirect('/training-center');
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

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // Get Trains
        $query = Train::query();
        $dateIn = Carbon::tomorrow();
        $dateOut = Carbon::tomorrow();;

        if (Auth::guard('guest')->check()) {
            // Get train_id from self cart
            $roomInCart = CartItem::where(function ($query) use ($dateIn) {
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

            // Get train_id from self order
            $roomInOrderSelf = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '!=', 'Rejected')
                    ->whereHas('order', function ($query) {
                        $query->where('guest_id', auth('guest')->id());
                    });
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '!=', 'Rejected')
                        ->whereHas('order', function ($query) {
                            $query->where('guest_id', auth('guest')->id());
                        });
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '!=', 'Rejected')
                        ->whereHas('order', function ($query) {
                            $query->where('guest_id', auth('guest')->id());
                        });
                })
                ->pluck('train_id')
                ->toArray();

            // Get train_id from all ACC'ed order
            $roomInOrderAll = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '=', 'Accepted');
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->pluck('train_id')
                ->toArray();

            $roomBooked = array_merge($roomInCart, $roomInOrderSelf, $roomInOrderAll);

            $query->whereNotIn('id', $roomBooked);
        } else {
            // Get train_id from all ACC'ed order
            $roomInOrderAll = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '=', 'Accepted');
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->pluck('train_id')
                ->toArray();

            $roomBooked = $roomInOrderAll;

            $query->whereNotIn('id', $roomBooked);
        }

        $trains = $query->get();

        return view('pelanggan.page.train', [
            'title'        => 'Training Center',
            'trains'       => $trains,
            'facilities'   => $facilities,
            'currentDate'  => $currentDate,
            'cart'         => $cart,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function search(Request $request)
    {
        $cart = Cart::find(auth('guest')->id());
        $currentDate = Carbon::now()->addDay();

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        $peserta = $request->peserta;
        $dateIn = $request->dateIn;
        $lama = $request->lama;
        $dateOut = date('Y-m-d', strtotime($dateIn . ' + ' . ($lama - 1) . ' days'));

        $query = Train::query();

        if ($peserta !== null) {
            $queryLayout = LayoutModels::where('kapasitas', '>=', $peserta)->pluck('train_id')->unique()->toArray();
            $query->whereIn('id', $queryLayout);
        }

        if (Auth::guard('guest')->check()) {
            // Get train_id from self cart
            $roomInCart = CartItem::where(function ($query) use ($dateIn) {
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

            // Get train_id from self order
            $roomInOrderSelf = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->whereHas('order', function ($query) {
                        $query->where('guest_id', auth('guest')->id());
                    });
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->whereHas('order', function ($query) {
                            $query->where('guest_id', auth('guest')->id());
                        });
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->whereHas('order', function ($query) {
                            $query->where('guest_id', auth('guest')->id());
                        });
                })
                ->pluck('train_id')
                ->toArray();

            // Get train_id from all ACC'ed order
            $roomInOrderAll = OrderItem::where(function ($query) use ($dateIn) {
                $query->where('checkin', '<=', $dateIn)
                    ->where('checkout', '>=', $dateIn)
                    ->where('status', '=', 'Accepted');
            })
                ->orWhere(function ($query) use ($dateOut) {
                    $query->where('checkin', '<=', $dateOut)
                        ->where('checkout', '>=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->orWhere(function ($query) use ($dateIn, $dateOut) {
                    $query->where('checkin', '>=', $dateIn)
                        ->where('checkout', '<=', $dateOut)
                        ->where('status', '=', 'Accepted');
                })
                ->pluck('train_id')
                ->toArray();

            $roomBooked = array_merge($roomInCart, $roomInOrderSelf, $roomInOrderAll);

            $query->whereNotIn('id', $roomBooked);
        }

        $trains = $query->get();
        $facilities = TrainFacility::all();

        return view('pelanggan.page.train', [
            'title'         => 'Training Center',
            'trains'        => $trains,
            'facilities'    => $facilities,
            'currentDate'   => $currentDate,
            'cart'          => $cart,
            'cartItemCount' => $cartItemCount,
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
            // Notifikasi untuk email belum terdaftar
            notify()->error('Email belum terdaftar.');

            return redirect()->back()->withErrors(['username' => 'Email belum terdaftar']);
        }

        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('guest', $guest);

            // Notifikasi untuk login berhasil
            notify()->success('Anda telah berhasil login!');

            return redirect()->intended('/');
        }

        // Notifikasi untuk password salah
        drakify('success');

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
        $orders = Order::where('guest_id', auth('guest')->id())->orderByDesc('created_at')->get();

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        return view('pelanggan.page.order', [
            'title' => 'Order',
            'orders' => $orders,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function showcheckout()
    {
        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        // Ambil semua data dari tabel cart_items
        $cartItems = CartItem::all();
        $fromCart = True;

        // Variabel untuk menyimpan total harga
        $totalPrice = 0;

        // Iterasi melalui setiap item dan tambahkan harganya ke dalam total
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->harga;
        }

        // Membuat ID pesanan yang unik
        $orderPrefix = 'ORD';
        $orderId = $orderPrefix . '_' . time(); // Contoh: ORD_1647898541

        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Parameter transaksi
        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId, // Menggunakan ID pesanan yang sudah dibuat
                'gross_amount' => $totalPrice, // Menggunakan total harga dari barang-barang di cart
            ),
            'customer_details' => array(
                'first_name' => $cartItem->Cart->Guest->name,
            ),
        );

        // Dapatkan snap token untuk pembayaran
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Tampilkan view checkout dengan meneruskan nilai snapToken
        $cart = Cart::find(auth('guest')->id());
        return view('pelanggan.page.checkout', [
            'title' => 'Checkout',
            'snapToken' => $snapToken,
            'cart' => $cart,
            'fromCart' => $fromCart,
            'totalHarga' => $totalPrice,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function checkoutKomplimen(Request $request, $cart_id)
    {
        $cart = Cart::find($cart_id);

        // store surat komplimen
        $surat = $request->file('surat');
        $namaSurat = time() . '.' . $surat->getClientOriginalExtension();
        $surat->storeAs('public/posts/surat', $namaSurat);

        // create order
        $order = Order::create([
            'guest_id'      => $cart->guest->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'surat'         => $namaSurat,
        ]);

        // create order item
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id'      => $order->id,
                'train_id'      => $item->train_id,
                'layout'        => $item->layout,
                'checkin'       => $item->checkin,
                'checkout'      => $item->checkout,
                'lama'          => $item->lama,
                'harga'         => $item->harga,
                'special'       => $item->special,
                'status'        => 'Pending',
            ]);
        }

        // Kirim email
        Mail::to("muhammadramzy65@gmail.com")->send(new notifOrderMasuk());

        CartItem::where('cart_id', $cart_id)->delete();

        return redirect('/order');
    }

    public function checkoutReguler(Request $request, $cart_id)
    {
        $cart = Cart::find($cart_id);

        // create order
        $order = Order::create([
            'guest_id'      => $cart->guest->id,
            'nama_kegiatan' => $request->nama_kegiatan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        // create order item
        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id'      => $order->id,
                'train_id'      => $item->train_id,
                'layout'        => $item->layout,
                'checkin'       => $item->checkin,
                'checkout'      => $item->checkout,
                'lama'          => $item->lama,
                'harga'         => $item->harga,
                'special'       => $item->special,
                'status'        => 'Pending',
            ]);
        }

        // Kirim email
        Mail::to("muhammadramzy65@gmail.com")->send(new notifOrderMasuk());

        CartItem::where('cart_id', $cart_id)->delete();

        // Redirect to showPayment route with order ID parameter
        return redirect('/payment/' . $order->id)->withErrors(['successAddToCart' => 'Order berhasil']);
    }

    public function reservasiLangsung(Request $request)
    {
        $fromCart = False;
        $train = Train::find($request->train_id);

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        $checkin = $request->checkin;
        $lamaHari = $request->lamaHari;
        $checkout = date('Y-m-d', strtotime($checkin . ' + ' . ($lamaHari - 1) . ' days'));

        $item = [
            'guest_id'      => auth('guest')->id(),
            'train_id'      => $request->train_id,
            'layout'        => $request->layout,
            'checkin'       => $request->checkin,
            'checkout'      => $checkout,
            'lama'          => $request->lamaHari,
            'harga'         => $request->harga,
            'special'       => $request->special,
        ];

        return view('pelanggan.page.checkout', [
            'title'     => 'Checkout',
            'item'      => $item,
            'train'     => $train,
            'fromCart'  => $fromCart,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function checkoutKomplimenLangsung(Request $request)
    {
        $item = json_decode($request->input('item'), true);

        // store surat komplimen
        $surat = $request->file('surat');
        $namaSurat = time() . '.' . $surat->getClientOriginalExtension();
        $surat->storeAs('public/posts/surat', $namaSurat);

        // create order
        $order = Order::create([
            'guest_id'       => $item['guest_id'],
            'nama_kegiatan'  => $request->nama_kegiatan,
            'surat'          => $namaSurat,
        ]);

        // create order item
        OrderItem::create([
            'order_id'      => $order->id,
            'train_id'      => $item['train_id'],
            'layout'        => $item['layout'],
            'checkin'       => $item['checkin'],
            'checkout'      => $item['checkout'],
            'lama'          => $item['lama'],
            'harga'         => $item['harga'],
            'special'       => $item['special'],
            'status'        => 'Pending',
        ]);

        return redirect('/order');
    }

    public function checkoutRegulerLangsung(Request $request)
    {
        $item = json_decode($request->input('item'), true);

        $order = Order::create([
            'guest_id'      => $item['guest_id'],
            'nama_kegiatan' => $request->nama_kegiatan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        OrderItem::create([
            'order_id'      => $order->id,
            'train_id'      => $item['train_id'],
            'layout'        => $item['layout'],
            'checkin'       => $item['checkin'],
            'checkout'      => $item['checkout'],
            'lama'          => $item['lama'],
            'harga'         => $item['harga'],
            'nama_kegiatan' => $request->nama_kegiatan,
            'special'       => $item['special'],
            'status'        => 'Pending',
        ]);

        return redirect('/payment/' . $order->id)->withErrors(['successAddToCart' => 'Order berhasil']);
    }

    public function invoiceShow($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $namaKegiatan = Order::where('id', $orderId)->value('nama_kegiatan');
        $totalHarga = OrderItem::where('order_id', $orderId)
            ->where('status', 'Accepted')
            ->sum('harga');

        return view('pelanggan.layout.invoice', [
            'order' => $order,
            'namaKegiatan' => $namaKegiatan,
            'totalHarga' => $totalHarga,
        ]);
    }

    public function invoiceDownload($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $namaKegiatan = Order::where('id', $orderId)->value('nama_kegiatan');

        $pdf = PDF::loadView('pelanggan.layout.invoice', compact('order'));
        $pdf->setPaper('A4', 'landscape');
    }

    public function showPayment($orderId)
    {
        $order = Order::where('id', $orderId)->first();
        $namaKegiatan = Order::where('id', $orderId)->value('nama_kegiatan');
        $totalHarga = OrderItem::where('order_id', $orderId)
            ->sum('harga');

        // get jumlah item dalam cart
        $cartItemCount = null;
        if (auth('guest')->check()) {
            $cartCount = Cart::where('guest_id', auth('guest')->id())->first();
            $cartItemCount = $cartCount->items->count();
        }

        return view('pelanggan.page.payment', [
            'title' => 'payment',
            'order' => $order,
            'namaKegiatan' => $namaKegiatan,
            'totalHarga' => $totalHarga,
            'cartItemCount' => $cartItemCount,
        ]);
    }
}
