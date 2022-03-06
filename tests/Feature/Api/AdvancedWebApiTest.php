<?php

namespace Tests\Feature\Api;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdvancedWebApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function actingAsで認証()
    {
        $user = User::factory()->create(
            [
                'name' => 'Mike',
            ]
        );
        $response = $this->withoutMiddleware()->actingAs($user)->getJson('/upload');
        $this->assertSame('Mike', $user->name);
        $response->assertStatus(200);
    }
    // /**
    //  * @test
    //  */
    // public function TeaPotMiddlewareを無効()
    // {
    //     $response = $this->withoutMiddleware(VerifyCsrfToken::class)->getJson('/upload');
    //     $response->assertStatus(200);
    // }
}
