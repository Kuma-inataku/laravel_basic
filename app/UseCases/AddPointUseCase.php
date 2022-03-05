<?php

namespace App\UseCases;


final class AddPointUseCase
{
    private $service;
    private $eloquentCustomer;
    private $eloquentCustomerPoint;

    public function __construct(AddPointService $service, EloquentCustomer $eloquentCustomer, EloquentCustomerPoint $eloquentCustomerPoint)
    {
        $this->service = $service;
        $this->eloquentCustomer = $eloquentCustomer;
        $this->eloquentCustomerPoint = $eloquentCustomerPoint;
    }
}