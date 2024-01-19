<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showadmin()
    {return view('admin.index');}

    public function showtrorder()
    {return view('admin.trainorder');}

    public function showtrlist()
    {return view('admin.trainlist');}

    public function showuser()
    {return view('admin.userlist');}

    public function showadminold()
    {return view('admin.index_old');}
}
