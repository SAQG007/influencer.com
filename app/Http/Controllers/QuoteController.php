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
        $quote = new Quote();
        $quote->quote = $request->input('quote');
        $quote->author = $request->input('author');

//        if(User::verifyAdmin())
//        {
//            $quote->save();
//        }

        $quote->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $quote = Quote::find($id);

//        if(User::verifyAdmin())
//        {
//            $flag = "edit";
//            return view('admin.upsert-quote')->with(['flag' => $flag, 'quote' => $quote]);
//        }

        $flag = "edit";
        return view('admin.upsert-quote')->with(['flag' => $flag, 'quote' => $quote]);
    }

    public function update(QuoteRequest $request, $id)
    {
        $quote = Quote::find($id);

        $quote->quote = $request->input('quote');
        $quote->author = $request->input('author');
        $quote->save();

//        if(User::verifyAdmin())
//        {
//            Quote::where('id', $id)->update($request->all());
//        }

        return redirect()->route('quotes.all.show');
    }

    public function changeStatus(QuoteRequest $request, $id)
    {
        $quote = Quote::find($id);

//        if(User::verifyAdmin())
//        {
//            if($quote->status == "active")
//            {
//                $quote->status = "inactive";
//            }
//            else
//            {
//                $quote->status = "active";
//            }
//
//            $quote->save();
//        }

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
