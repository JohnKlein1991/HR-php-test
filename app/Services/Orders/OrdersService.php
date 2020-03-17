<?php


namespace App\Services\Orders;


use App\Services\Orders\Repositories\OrdersRepository;

/**
 * Class OrdersService
 * @package App\Services\Orders
 */
class OrdersService
{
    /**
     * @var OrdersRepository
     */
    private $repository;

    /**
     * OrdersService constructor.
     * @param OrdersRepository $repository
     */
    public function __construct(OrdersRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getOrdersList()
    {
        return $this->repository->getOrdersList();
    }
}