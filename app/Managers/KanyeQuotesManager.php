<?php

namespace App\Managers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class KanyeQuotesManager
{
    public function getRandomQuotes($count = 5)
    {
        $quotes = Cache::remember('kanye_quotes', now()->addMinutes(60), function () use ($count) {
            $quotes = [];

            for ($i = 1; $i <= $count; $i++) {
                $response = Http::get("https://api.kanye.rest/");
                $quote = [
                    'id' => $i,
                    'quote' => $response->json(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $quotes[] = $quote;
            }

            return $quotes;
        });

        return $quotes;
    }

}
