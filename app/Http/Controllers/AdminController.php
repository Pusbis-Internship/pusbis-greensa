<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Order;
use App\Models\Train;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exports\HistoryExport;
use App\Models\LayoutModels;
use Illuminate\Support\Facades\Db;

use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function showlogin()
    {
        return view('admin.page.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin-login');
    }

    public function showorderspj()
    {
        $orders = Order::whereNotNull('surat')->get();

        // cek order yang kadaluarsa
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        OrderItem::whereDate('checkin', '<=', $now)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        return view('admin.page.orderspj', ['orders' => $orders]);
    }

    public function showorderreguler()
    {
        $orders = Order::whereNull('surat')->get();

        // cek order yang kadaluarsa
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        OrderItem::whereDate('checkin', '<=', $now)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        return view('admin.page.orderreguler', ['orders' => $orders]);
    }

    public function showhistory()
    {
        $orders = Order::whereHas('items', function ($query) {
            $query->where('status', '!=', 'Pending');
        })->get();

        // cek order yang kadaluarsa
        $now = Carbon::now();
        $now = $now->format('Y-m-d');

        OrderItem::whereDate('checkin', '<=', $now)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        return view('admin.page.history', ['orders' => $orders]);
    }

    public function accOrder($itemId)
    {
        $item = OrderItem::findOrFail($itemId);
        $item->status = 'Accepted';
        $item->save();

        return redirect()->back()->with('success', 'Order has been accepted.');
    }

    public function rejectOrder($itemId)
    {
        $item = OrderItem::findOrFail($itemId);
        $item->status = 'Rejected';
        $item->save();

        return redirect()->back()->with('success', 'Order has been rejected.');
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $status = $request->input('status');

        if ($status == 'Acc' || $status == 'Reject') {
            $order->status = $status;
            $order->save();
        }

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function deleteSelectedOrders(Request $request)
    {
        // Validasi request
        $request->validate([
            'order_ids' => 'required|array', // Memastikan order_ids ada dan bertipe array
            'order_ids.*' => 'exists:order_items,id', // Memastikan setiap order_id ada di database
        ]);

        // Mendapatkan order_ids dari request
        $orderIds = $request->order_ids;

        // Mendapatkan order_items yang sesuai dengan order_ids
        $orderItems = OrderItem::whereIn('id', $orderIds)->get();

        // Mendapatkan order_ids yang unik dari order_items
        $uniqueOrderIds = $orderItems->pluck('order_id')->unique()->toArray();

        // Menghapus order_items yang sesuai dengan order_ids
        OrderItem::whereIn('id', $orderIds)->delete();

        // Menghapus order yang memiliki order_id yang sama dengan order_ids
        Order::whereIn('id', $uniqueOrderIds)->delete();

        // Redirect atau kembali ke halaman yang sesuai setelah penghapusan berhasil
        return redirect()->back()->with('success', 'Selected orders have been deleted successfully.');
    }


    public function showtcstore()
    {
        return view('admin.page.listTC.trainstore');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('admin', $admin);
            return redirect()->intended('/admin')->withErrors(['akun' => 'Sudah Login !!!']);
        }

        return redirect()->back()->withErrors(['akun' => 'Akun salah']);
    }

    public function showtcedit($id)
    {
        $train = Train::findOrFail($id);
        return view('admin.page.listTC.trainedit', ['train' => $train]);
    }

    public function showadmin(MonthlyUsersChart $chart)
    {
        // Logika pengambilan data berdasarkan filter yang dipilih
        $orders = Order::all();
        $order_pending = OrderItem::where('status', 'Pending')->count();
        $order_acc = OrderItem::where('status', 'Accepted')->count();
        $order_rej = OrderItem::where('status', 'Rejected')->count();
        $pendapatan = OrderItem::where('status', 'Accepted')->sum('harga');
        $orderschart['chart'] = $chart->build();

        $currentMonth = Carbon::now()->month; // Mengambil bulan saat ini

        $order_accmonth = OrderItem::where('status', 'Accepted')
            ->whereMonth('checkin', $currentMonth) // Hanya pesanan dalam bulan ini
            ->select(DB::raw('count(*) as total'))
            ->first(); // Menggunakan first() untuk hanya mengambil satu baris hasil pertama

        $total_accmonth = $order_accmonth->total;

        $order_pending_month = OrderItem::where('status', 'Pending')
        ->whereMonth('checkin', $currentMonth)
        ->count();
        // dd($order_pending_month);
        $order_rejected_month = OrderItem::where('status', 'Rejected')
        ->whereMonth('checkin', $currentMonth)
        ->count();
        
        $pendapatan_month = OrderItem::where('status', 'Accepted')
        ->whereMonth('checkin', $currentMonth)
        ->sum('harga');
        // dd($pendapatan);

        return view('admin.page.dashboard', [
            'orders' => $orders,
            'order_pending' => $order_pending,
            'order_acc' => $order_acc,
            'order_rej' => $order_rej,
            'pendapatan' => $pendapatan,
            'orderschart' => $orderschart,
            'total_accmonth' => $total_accmonth,
            'order_pending_month'=> $order_pending_month,
            'order_rejected_month'=> $order_rejected_month,
            'pendapatan_month'=>$pendapatan_month // Mengirim total pesanan yang diterima pada bulan ini
        ]);
    }


    public function showtrlist()
    {
        $trains = Train::all();
        return view('admin.page.listTC.trainlist', ['trains' => $trains]);
    }

    public function showuserlist()
    {
        $guests = Guest::all();
        return view('admin.page.userlist', ['guests' => $guests]);
    }

    public function userdelete($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect('/admin-user-list')->withErrors(['Akun berhasil dihapus']);
    }



    public function tcedit(Request $request, $id)
    {
        // update train
        $train = Train::findOrFail($id);
        $train->update([
            'nama'      => $request->nama,
            'lantai'    => $request->lantai,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // update kapsitas
        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'Classroom')
            ->update(['kapasitas' => $request->kap_Classroom]);

        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'Teater')
            ->update(['kapasitas' => $request->kap_Teater]);

        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'Round Table')
            ->update(['kapasitas' => $request->kap_Round_Table]);

        LayoutModels::where('train_id', $id)
            ->where('nama_layout', 'U Shape')
            ->update(['kapasitas' => $request->kap_U_Shape]);

        // update gambar utama
        if ($request->hasFile('gambar_utama')) {
            //upload new image
            $gambarPath = $request->file('gambar_utama');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'utama')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'utama')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar biasa1
        if ($request->hasFile('gambar_biasa1')) {
            //upload new image
            $gambarPath = $request->file('gambar_biasa1');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'biasa1')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'biasa1')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar biasa2
        if ($request->hasFile('gambar_biasa2')) {
            //upload new image
            $gambarPath = $request->file('gambar_biasa2');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'biasa2')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'biasa2')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar biasa3
        if ($request->hasFile('gambar_biasa3')) {
            //upload new image
            $gambarPath = $request->file('gambar_biasa3');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'biasa3')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'biasa3')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        // update gambar denah
        if ($request->hasFile('gambar_denah')) {
            //upload new image
            $gambarPath = $request->file('gambar_denah');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->images()->where('konten', 'denah')->value('gambar'));

            //update train with new image
            $train->images()->where('konten', 'denah')
                ->update(['gambar' => $gambarPath->hashName(),]);
        }

        return redirect()->route('train.showlist')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function tcdelete($id)
    {
        $train = Train::findOrFail($id);

        $train->delete();
        Storage::delete('public/posts/' . $train->gambar);

        return redirect('/admin-training-center-list')->withErrors(['Training Center berhasil dihapus']);
    }

    public function tcstore(Request $request)
    {
        // create train
        $train = Train::create([
            'nama'      => $request->nama,
            'lantai'    => $request->lantai,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // add gambar utama
        if ($request->hasFile('gambar_utama')) {
            // upload new image
            $gambarPath = $request->file('gambar_utama');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'utama',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar biasa1
        if ($request->hasFile('gambar_biasa1')) {
            // upload new image
            $gambarPath = $request->file('gambar_biasa1');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'biasa1',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar biasa2
        if ($request->hasFile('gambar_biasa2')) {
            // upload new image
            $gambarPath = $request->file('gambar_biasa2');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'biasa2',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar biasa3
        if ($request->hasFile('gambar_biasa3')) {
            // upload new image
            $gambarPath = $request->file('gambar_biasa3');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'biasa3',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // add gambar denah
        if ($request->hasFile('gambar_denah')) {
            // upload new image
            $gambarPath = $request->file('gambar_denah');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            // update train with new image
            $train->images()->create([
                'konten' => 'denah',
                'gambar' => $gambarPath->hashName(),
            ]);
        }

        // create layout
        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'Classroom',
            'kapasitas'    => $request->kap_class,
        ]);

        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'Teater',
            'kapasitas'    => $request->kap_teater,
        ]);

        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'Round Table',
            'kapasitas'    => $request->kap_roundtable,
        ]);

        LayoutModels::create([
            'train_id'     => $train->id,
            'nama_layout'  => 'U Shape',
            'kapasitas'    => $request->kap_ushape,
        ]);

        return redirect('/admin-training-center-list')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }
}
