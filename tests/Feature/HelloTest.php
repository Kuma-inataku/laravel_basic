<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     * 
     */
    public function testHello()
    {
        $this->assertTrue(true);
        
        $arr = [];

        $msg = 'Hello';
        $this->assertEquals('Hello', $msg);

        $n = random_int(1, 100);
        $this->assertLessThan(100, $n);
        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
