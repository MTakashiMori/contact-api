<?php

namespace App\Services;

use App\Repositories\CustomAttributeRepository;

/**
 * Class CustomAttributeService
 * @package App\Services
 */
class CustomAttributeService extends BaseService
{

    /**
     * CustomAttributeService constructor.
     * @param CustomAttributeRepository $repository
     */
    public function __construct(CustomAttributeRepository $repository)
    {
        $this->repository  = $repository;
    }
}
