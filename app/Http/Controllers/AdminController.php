<?php

namespace App\Http\Controllers;
use App\Models\Guest;
use App\Models\Train;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function showadmin()
    {
        $trains = Train::all();

        return view('admin.page.dashboard', ['trains' => $trains]);
    }
    
    public function showtrorder()
    {return view('admin.page.trainorder');}

    public function showtrlist()
    {   
        $trains = Train::all();

        return view('admin.page.listTC.trainlist', ['trains' => $trains]);
    }
    
    public function showuser()
    {return view('admin.page.userlist');}



    
    
    // delete lict tc
    public function destroy($id)
    {
        $train = Train::findOrFail($id);
        $train->delete();
        
        return redirect('/admin-training-center-list')->withErrors(['Password salah']);
    }


    
    public function showinsertTC()
    {return view('admin.page.listTC.insert');}
    

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'lantai' => 'required',
            'kap_class' => 'required|numeric',
            'kap_teater' => 'required|numeric',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);

        // Simpan gambar ke direktori penyimpanan (misalnya: storage/app/public/images)
        $gambarPath = $request->file('gambar')->store('images', 'public');

        // Simpan data ke database
        Train::create([
            'nama' => $request->nama,
            'lantai' => $request->lantai,
            'kap_class' => $request->kap_class,
            'kap_teater' => $request->kap_teater,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath, // Simpan path gambar
            // Simpan kolom lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman yang diinginkan setelah penyimpanan data
        return redirect('/admin-training-center-list')->with('success', 'Data pelatihan berhasil ditambahkan.');
    }
}


