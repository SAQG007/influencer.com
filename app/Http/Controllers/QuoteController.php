<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quotes;

class QuoteController extends Controller
{
    public function create()
    {
        return view('influencer.add-new-quote');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required | max:100'
        ]);

        $quote = new Quotes();
        $quote->quote = $request->input('quote');

        if(User::verifyAdmin())
        {
            $quote->save();
        }
    }
}
