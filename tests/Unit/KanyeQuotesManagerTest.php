<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Managers\KanyeQuotesManagerFactory;

class KanyeQuotesManagerTest extends TestCase
{
    public function testGetRandomQuotes()
    {
        $kanyeQuotesManager = KanyeQuotesManagerFactory::create();
        $quotes = $kanyeQuotesManager->getRandomQuotes(5);

        // Assertions to verify the format and data of the quotes.
        $this->assertIsArray($quotes);
        $this->assertCount(5, $quotes);

        foreach ($quotes as $quote) {
            $this->assertArrayHasKey('id', $quote);
            $this->assertArrayHasKey('quote', $quote);
            $this->assertArrayHasKey('created_at', $quote);
            $this->assertArrayHasKey('updated_at', $quote);

            $this->assertIsInt($quote['id']);
            $this->assertIsArray($quote['quote']);
            $this->assertIsObject($quote['created_at']);
            $this->assertIsObject($quote['updated_at']);
        }
    }
}
