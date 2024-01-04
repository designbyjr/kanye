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
                ["Authorization"=>"Bearer ".env("API_TOKEN")]
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
            ["Authorization"=>"Bearer ".env("API_TOKEN")]
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
                'status'
            ]);
    }
}
