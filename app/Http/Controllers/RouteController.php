<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view('influencer.index');
    }

    public function redirectToHome()
    {
        return redirect()->route('home');
    }
}
