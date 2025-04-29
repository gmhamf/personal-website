<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('cone');
    }

    public function convert(Request $request)
    {
        $from = $request->input('from_currency');
        $to = $request->input('to_currency');
        $amount = $request->input('amount');


        $response = Http::get("https://api.coingecko.com/api/v3/simple/price", [
            'ids' => $from,
            'vs_currencies' => $to
        ]);

        if ($response->successful()) {
            $rate = $response->json()[$from][$to] ?? null;

            if ($rate) {
                $convertedAmount = $amount * $rate;
                return view('convert', compact('convertedAmount', 'amount', 'from', 'to'));
            } else {
                return back()->with('error', 'Conversion rate not found.');
            }
        } else {
            return back()->with('error', 'Failed to fetch exchange rate.');
        }
    }
}
