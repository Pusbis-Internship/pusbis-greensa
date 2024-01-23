<?php

namespace App\Http\Controllers;
use App\Models\Guest;
use App\Models\Train;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class AdminController extends Controller
{
    
    public function showtrorder()
    {return view('admin.page.trainorder');}

    public function showtcstore()
    {return view('admin.page.listTC.trainstore');}

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

        return redirect()->route('train.showlist')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function tcdelete($id)
    {
        $train = Train::findOrFail($id);
        $train->delete();
        
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

        $gambarPath = $request->file('gambar')->store('images', 'public');

        Train::create([
            'nama' => $request->nama,
            'lantai' => $request->lantai,
            'kap_class' => $request->kap_class,
            'kap_teater' => $request->kap_teater,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect('/admin-training-center-list')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }
}


