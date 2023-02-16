<?php

namespace App\Repository;

use App\Models\Cast;

class CastRepository extends BaseRepository implements CastRepositoryInterface
{
    protected $model;

    public function __construct(Cast $model)
    {
        $this->model = $model;
    }
}
