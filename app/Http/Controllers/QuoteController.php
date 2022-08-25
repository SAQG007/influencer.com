<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function create()
    {
        return view('influencer.add-new-quote');
    }
}
