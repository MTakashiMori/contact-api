<?php

namespace App\Services;

use App\Repositories\TeamRepository;

/**
 * Class TeamService
 * @package App\Services
 */
class TeamService extends BaseService
{

    /**
     * TeamService constructor.
     * @param TeamRepository $repository
     */
    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }
}
