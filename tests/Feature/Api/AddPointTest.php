<?php

namespace Tests\Feature\Api;

use App\Models\EloquentCustomer;
use App\Models\EloquentCustomerPoint;
use Carbon\CarbonImmutable;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddPointTest extends TestCase
{
    use RefreshDatabase;

    const CUSTOMER_ID = 1;

    protected function setUp(): void
    {
        parent::setUp();

        CarbonImmutable::setTestNow();

        EloquentCustomer::factory()->create(
            [
                'id' => self::CUSTOMER_ID,
            ]
        );
        EloquentCustomerPoint::unguard();
        EloquentCustomerPoint::create(
            [
                'customer_id' => self::CUSTOMER_ID,
                'point' => 100,
            ]
        );
        EloquentCustomerPoint::reguard();
    }

    /**
     * @test
     */
    public function put_add_point()
    {
        $response = $this->putJson(
            'api/customers/add_point',
            [
                'customer_id' => self::CUSTOMER_ID,
                'add_point' => 10,
            ]
        );

        $response->assertStatus(200);
        $expected = ['customer_point' => 110];
        $response->assertExactJson($expected);

        $this->assertDatabaseHas(
            'customer_points',
            [
                'customer_id' => self::CUSTOMER_ID,
                'point' => 110,
            ]
        );

        $this->assertDatabaseHas(
            'customer_point_events',
            [
                'customer_id' => self::CUSTOMER_ID,
                'event' => 'ADD_POINT',
                'point' => 10,
                'created_at' => CarbonImmutable::now()->toDayDateTimeString(),
            ]
        );
    }
}
