<?php

namespace App\Http\Controllers;

use App\Services\Partners\PartnersService;
use Illuminate\Http\Request;

/**
 * Class PartnerController
 * @package App\Http\Controllers
 */
class PartnerController extends Controller
{
    /**
     * @var PartnersService
     */
    private $service;

    /**
     * PartnerController constructor.
     * @param PartnersService $service
     */
    public function __construct(PartnersService $service)
    {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->service->getList()->toJson();
    }
}
