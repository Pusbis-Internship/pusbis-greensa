<?php

namespace App\Http\Controllers;

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

    public function export() 
    {
        return Excel::download(new HistoryExport, 'users.xlsx');
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
        // Validasi bahwa ada order yang dipilih untuk dihapus
        $request->validate([
            'order_ids' => 'required|array',
            'order_ids.*' => 'exists:orders,id',
        ]);

        // Ambil ID order yang dipilih dari form
        $orderIds = $request->input('order_ids');

        // Hapus order yang dipilih
        Order::whereIn('id', $orderIds)->delete();

        return redirect()->back()->with('success', 'Selected orders have been deleted.');
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

    public function showadmin()
    {
        $orders = Order::all();
        $order_pending = OrderItem::where('status', 'Pending')->count();
        $order_acc = OrderItem::where('status', 'Accepted')->count();
        $order_rej = OrderItem::where('status', 'Rejected')->count();
        $pendapatan = OrderItem::where('status', 'Accepted')->sum('harga');

        return view('admin.page.dashboard',[
            'orders' => $orders,
            'order_pending' => $order_pending,
            'order_acc' => $order_acc,
            'order_rej' => $order_rej,
            'pendapatan' => $pendapatan,
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
        Train::findOrFail($id)
        ->update([
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


        // //check if image is uploaded
        // if ($request->hasFile('gambar')) {

        //     //upload new image
        //     $gambarPath = $request->file('gambar');
        //     $gambarPath->storeAs('public/posts', $gambarPath->hashName());

        //     //delete old image
        //     Storage::delete('public/posts/' . $train->gambar);

        //     //update train with new image
        //     $train->update([
        //         'nama' => $request->nama,
        //         'lantai' => $request->lantai,
        //         'kap_class' => $request->kap_class,
        //         'kap_teater' => $request->kap_teater,
        //         'harga' => $request->harga,
        //         'deskripsi' => $request->deskripsi,
        //         'gambar' => $gambarPath->hashName(),
        //     ]);
        // } else {

        //     //update train without image
        //     $train->update([
        //         'nama' => $request->nama,
        //         'lantai' => $request->lantai,
        //         'kap_class' => $request->kap_class,
        //         'kap_teater' => $request->kap_teater,
        //         'harga' => $request->harga,
        //         'deskripsi' => $request->deskripsi,
        //     ]);
        // }

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
        $request->validate([
            'nama' => 'required',
            'lantai' => 'required',
            'kap_class' => 'required|numeric',
            'kap_teater' => 'required|numeric',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar');
        $gambarPath->storeAs('public/posts', $gambarPath->hashName());

        Train::create([
            'nama' => $request->nama,
            'lantai' => $request->lantai,
            'kap_class' => $request->kap_class,
            'kap_teater' => $request->kap_teater,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath->hashName(),
        ]);

        return redirect('/admin-training-center-list')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }
}
