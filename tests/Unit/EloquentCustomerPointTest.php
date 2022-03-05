<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use App\Models\EloquentCustomer;
use App\Models\EloquentCustomerPointEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentCustomerPointEventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function addPoint()
    {
        $customerId = 1;
        EloquentCustomer::factory()->create(
            [
                'id' => $customerId,
            ]
        );
        
    }
}
