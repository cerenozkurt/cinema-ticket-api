<?php

namespace App\Repository;

use App\Models\Cast;
use App\Models\Director;

class DirectorRepository extends BaseRepository implements DirectorRepositoryInterface
{
    protected $model;

    public function __construct(Director $model)
    {
        $this->model = $model;
    }
}
