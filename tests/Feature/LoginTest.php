<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $client = new Client();

        $response = $client->get('http://localhost/basic_laravel/public/login');
        // @see: https://qiita.com/kanaxx/items/daca1c57e48e0a8d674a
        // @see: https://stackoverflow.com/questions/56538877/laravel-guzzlehttp-post-with-csrf
        $pattern = '/<input type="hidden" name="_token" value="([^"]*)"/';
        preg_match($pattern, $response->getBody()->getContents(), $token);

        $response = $client->post('http://localhost/basic_laravel/public/login', [
            'email' => 'test@test.com',
            'password' => 11111111,
            '_token' => $token[1],
            // 'form_params' => [
            //     'email' => 'test@test.com',
            //     'password' => 11111111,
            //     '_token' => $token[1],
            // ],
        ]);
        $this->assertSame(200, $response->getStatusCode());
    }
}
