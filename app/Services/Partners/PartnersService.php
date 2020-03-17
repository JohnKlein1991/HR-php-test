<?php


namespace App\Services\Partners;


use App\Services\Partners\Repositories\PartnersRepository;

/**
 * Class PartnersService
 * @package App\Services\Partners
 */
class PartnersService
{
    /**
     * @var PartnersRepository
     */
    private $repository;

    /**
     * PartnersService constructor.
     * @param PartnersRepository $repository
     */
    public function __construct(PartnersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \App\Models\Partner[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        return $this->repository->selectAllPartners();
    }
}