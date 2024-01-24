<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guest;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function showlogin()
    {
        return view('admin.page.login');
    }

    public function showtrorder()
    {
        return view('admin.page.trainorder');
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
        $trains = Train::all();
        return view('admin.page.dashboard', ['trains' => $trains]);
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



    public function tcedit(Request $request, $id, Train $train)
    {
        $train = Train::findOrFail($id);

        $train->update([
            'nama'     => $request->nama,
            'lantai'   => $request->lantai,
            'kap_class'   => $request->kap_class,
            'kap_teater'   => $request->kap_teater,
            'harga'   => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'gambar'   => $request->gambar,
        ]);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambarPath = $request->file('gambar');
            $gambarPath->storeAs('public/posts', $gambarPath->hashName());

            //delete old image
            Storage::delete('public/posts/' . $train->gambar);

            //update train with new image
            $train->update([
                'nama' => $request->nama,
                'lantai' => $request->lantai,
                'kap_class' => $request->kap_class,
                'kap_teater' => $request->kap_teater,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambarPath->hashName(),
            ]);
        } else {

            //update train without image
            $train->update([
                'nama' => $request->nama,
                'lantai' => $request->lantai,
                'kap_class' => $request->kap_class,
                'kap_teater' => $request->kap_teater,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ]);
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

        //  //upload image
        //  $image = $request->file('image');
        //  $image->storeAs('public/posts', $image->hashName());


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
