<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::simplePaginate(10);
        return view('admin.all-quotes')->with(['quotes' => $quotes]);
    }

    public function create()
    {
        $flag = "create";
        return view('admin.upsert-quote')->with(['flag' => $flag]);
    }

    public function store(QuoteRequest $request)
    {
        $quote = new Quote($request->all());
//        $quote->quote = $request->input('quote');
//        $quote->author = $request->input('author');

        $quote->save();

        return redirect()->route('quotes.all.show');
    }

    public function edit($id)
    {
        $quote = Quote::find($id);

        $flag = "edit";
        return view('admin.upsert-quote')->with(['flag' => $flag, 'quote' => $quote]);
    }

    public function update(QuoteRequest $request, $id)
    {
        $quote = Quote::find($id);

        $quote->quote = $request->input('quote');
        $quote->author = $request->input('author');
        $quote->language = $request->input('language');
        $quote->save();

        return redirect()->route('quotes.all.show');
    }

    public function changeStatus($id)
    {
        $quote = Quote::find($id);

        if($quote->status == "active")
        {
            $quote->status = "inactive";
        }
        else
        {
            $quote->status = "active";
        }

        $quote->save();

        return redirect()->back();
    }
}
