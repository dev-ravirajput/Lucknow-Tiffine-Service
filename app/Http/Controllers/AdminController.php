<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function kitchens()
    {
        return view('admin.kitchens.index');
    }

    public function create_kitchens()
    {
        return view('admin.kitchens.create');
    }
}
