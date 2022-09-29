<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function users()
    {
        return view('users');
    }
    public function dash()
    {
        return view('dash');
    }
}
