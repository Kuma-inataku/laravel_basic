<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Person;
use App\Models\User;
use Carbon\Factory;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     * 
     */

     use DatabaseMigrations;

    public function testHello()
    {
        $this->assertTrue(true);
        
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/hello');
        $response->assertStatus(302);

        $person = factory(User::class)->create();
        // $person = factory(User::class)->create();
        $response = $this->actingAs($person)->get('/hello');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);

    }
}
