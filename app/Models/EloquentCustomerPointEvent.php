<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EloquentCustomerPointEvent extends Model
{
    // use HasFactory;
    use RefreshDatabase;
    protected $table = 'customer_point_events';
    public $timestamps = false;

    public function register(PointEvent $event)
    {
        $new = $this->newInstance();
        $new->cunstomer_id = $event->getCustomerId();
        $new->event = $event->getEvent();
        $new->point = $event->getPoint();
        $new->created_at = $event->getCreatedAt()->toDateTimeString();
        $new->save();
    }
}
