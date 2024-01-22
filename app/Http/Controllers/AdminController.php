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

        return view('admin.page.trainlist', ['trains' => $trains]);
    }
    
    public function showuser()
    {return view('admin.page.userlist');}

    public function showadminold()
    {return view('admin.index_old');}

    // public function destroy($id)
    // {
    // $train = Train::findOrFail($id);
    // $train->delete();

    // return redirect()->route('admin.page.dashboard')->with('success', 'Data pelatihan berhasil dihapus.');
    // }
}
