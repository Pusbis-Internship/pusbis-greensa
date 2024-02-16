<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Cart;
use Midtrans\Config;
use Midtrans\Snap;


class Checkout extends Controller
{
    public function checkoutReguler(Request $request)
    {
        // Ambil semua data dari tabel cart_items
        $cartItems = CartItem::all();

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
            'cart' => $cart

        ]);
    }
}
