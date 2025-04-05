<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $title = "TastyGo - Good Food on the Move.";
        return view('welcome', compact('title'));
    }

    public function about()
    {
        $title = "TastyGo - Good Food on the Move.";
        return view('about', compact('title'));
    }

    public function contact()
    {
        $title = "TastyGo - Good Food on the Move.";
        return view('contact', compact('title'));
    }

    public function menu()
    {
        $title = "TastyGo - Good Food on the Move.";
        return view('menu', compact('title'));
    }
}
