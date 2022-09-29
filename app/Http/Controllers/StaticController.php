<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function users()
    {
        return view('users');
    }
}
