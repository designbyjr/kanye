<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KanyeQuotesControllerTest extends TestCase
{
    public function testGetRandomQuotes()
    {
        $response = $this->get('api/quotes/random?count=5',
                ["Authorization"=>"Bearer d73ad1a66b9121b51d0b9c6113322c231c9338f333ddb70fdbc5637a328478fe"]
                    );

        $response->assertStatus(200)
            ->assertJsonStructure([
                'jsonrpc',
                'result' => [
                    [
                        'id',
                        'quote',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);

    }

    public function testRefreshQuotes()
    {
        $response = $this->post('api/quotes/refresh',[],
            ["Authorization"=>"Bearer d73ad1a66b9121b51d0b9c6113322c231c9338f333ddb70fdbc5637a328478fe"]
        );

        $response->assertStatus(200)
            ->assertJsonStructure([
                'jsonrpc',
                'result' => [
                    [
                        'id',
                        'quote',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'status' => "Quotes refreshed"
            ]);
    }
}
