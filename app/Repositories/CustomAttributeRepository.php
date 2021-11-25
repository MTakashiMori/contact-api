<?php

namespace App\Repositories;

use App\Models\CustomAttribute;

/**
 * Class CustomAttributeRepository
 * @package App\Repositories
 */
class CustomAttributeRepository extends BaseRepository
{

    /**
     * CustomAttributeRepository constructor.
     * @param CustomAttribute $model
     */
    public function __construct(CustomAttribute $model)
    {
        $this->model = $model;
    }
}
