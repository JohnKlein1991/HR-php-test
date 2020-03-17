<?php


namespace App\Services\Orders\Repositories;


use App\Models\Order;
use Illuminate\Support\Collection;

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

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getOrderById(int $id)
    {
        return Order::with('product')
            ->findOrFail($id);
    }

    /**
     * @return Collection
     */
    public function getStatusesList()
    {
        $list = [
            [
                'id' => Order::STATUS_ID_NEW,
                'title' => Order::STATUS_TITLE_NEW
            ],
            [
                'id' => Order::STATUS_ID_ACCEPTED,
                'title' => Order::STATUS_TITLE_ACCEPTED
            ],
            [
                'id' => Order::STATUS_ID_FINISHED,
                'title' => Order::STATUS_TITLE_FINISHED
            ],
        ];
        return new Collection($list);
    }
}