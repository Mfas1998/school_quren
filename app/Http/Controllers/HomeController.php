<?php

namespace App\Http\Controllers;

// use App\Models\student;
// use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return view('auth.selection');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
