<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
//        return view('influencer.index');
        return redirect('/register');
    }

    public function redirectToHome()
    {
        return view('influencer.index');
    }
}
