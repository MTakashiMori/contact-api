<?php

namespace App\Repositories;

use App\Models\Team;

/**
 * Class TeamRepository
 * @package App\Repositories
 */
class TeamRepository extends BaseRepository
{

    /**
     * TeamRepository constructor.
     * @param Team $model
     */
    public function __construct(Team $model)
    {
        $this->model = $model;
    }
}
