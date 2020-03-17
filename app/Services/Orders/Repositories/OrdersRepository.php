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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getOrdersList()
    {
        return Order::with('partner:id,name')
            ->with('product')
            ->paginate(20);
    }
}