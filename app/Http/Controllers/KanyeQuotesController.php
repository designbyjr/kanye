<?php

namespace App\Http\Controllers;

use App\Managers\KanyeQuotesManagerFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class KanyeQuotesController extends Controller
{
    public function getRandomQuotes(Request $request)
    {
        $count = $request->input('count', 5);
        $kanyeQuotesManager = KanyeQuotesManagerFactory::create();
        $quotes = $kanyeQuotesManager->getRandomQuotes($count);

        return response()->json([
            'jsonrpc' => '2.0',
            'result' => $quotes,
        ]);
    }

    public function refreshQuotes(Request $request)
    {
        Cache::forget('kanye_quotes');
        $count = $request->input('count', 5);
        $kanyeQuotesManager = KanyeQuotesManagerFactory::create();
        $quotes = $kanyeQuotesManager->getRandomQuotes($count);
        return response()->json([
            'jsonrpc' => '2.0',
            'result' => $quotes,
            "status" => "Quotes refreshed"
        ]);
    }

}
