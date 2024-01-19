<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showadmin()
    {return view('admin.index');}

    public function showadminold()
    {return view('admin.index_old');}
}
