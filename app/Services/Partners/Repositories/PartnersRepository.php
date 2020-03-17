<?php

namespace App\Services\Partners\Repositories;

use App\Models\Partner;

/**
 * Class PartnersRepository
 * @package App\Services\Partners\Repositories
 */
class PartnersRepository
{
    /**
     * @return Partner[]|\Illuminate\Database\Eloquent\Collection
     */
    public function selectAllPartners()
    {
        return Partner::all([
            'id',
            'name'
        ]);
    }
}