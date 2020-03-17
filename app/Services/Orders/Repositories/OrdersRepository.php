<?php


namespace App\Services\Orders\Repositories;


use App\Models\Order;

/**
 * Class OrdersRepository
 * @package App\Services\Orders\Repositories
 */
class OrdersRepository
{
    /**
     * @return Order[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getOrdersList()
    {
        return Order::paginate(20);
    }
}