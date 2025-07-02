<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function features()
    {
        return view('landing.features');
    }

    public function pricing()
    {
        return view('landing.pricing');
    }

    public function contact()
    {
        return view('landing.contact');
    }
}
