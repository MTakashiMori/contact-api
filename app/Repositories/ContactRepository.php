<?php

namespace App\Repositories;

use App\Models\Contact;

/**
 * Class ContactRepository
 * @package App\Repositories
 */
class ContactRepository extends BaseRepository
{

    /**
     * ContactRepository constructor.
     * @param Contact $model
     */
    public function __construct(Contact $model)
    {
        $this->model = $model;
        $this->relationship = [];
    }
}
