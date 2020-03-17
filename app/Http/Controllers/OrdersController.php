<?php

namespace App\Http\Controllers;

use App\Services\Orders\OrdersService;
use Illuminate\Http\Request;

/**
 * Class OrdersController
 * @package App\Http\Controllers
 */
class OrdersController extends Controller
{
    /**
     * @var OrdersService
     */
    private $service;

    /**
     * OrdersController constructor.
     * @param OrdersService $service
     */
    public function __construct(OrdersService $service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function index()
    {
        $list = $this->service->getOrdersList();

        return $list->toJson();
    }

    /**
     * @param int $id
     * @return string
     */
    public function getOrder(int $id)
    {
        $data = $this->service->getOrderById($id);
        return $data->toJson();
    }

    /**
     * @return mixed
     */
    public function getStatusesList()
    {
        $data = $this->service->getStatusesList();
        return $data->toJson();
    }
}
