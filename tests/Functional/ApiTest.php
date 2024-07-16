<?php

// tests/Functional/ApiTest.php

namespace App\Tests\Functional;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost:8000',
            'http_errors' => true
        ]);
    }

    public function testGetLeague()
    {
        $response = $this->client->request('GET', '/api/leagues/1');
        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('name', $data);
        $this->assertEquals('Premier League', $data['name']);
    }

    public function testCreateLeague()
    {
        $response = $this->client->request('POST', '/api/leagues', [
            'json' => [
                'name' => 'La Liga',
                'user_id' => 1
            ]
        ]);

        $this->assertEquals(201, $response->getStatusCode());

        $data = json_decode($response->getBody()->getContents(), true);
        $this->assertArrayHasKey('id', $data);
        $this->assertEquals('La Liga', $data['name']);
    }
}
