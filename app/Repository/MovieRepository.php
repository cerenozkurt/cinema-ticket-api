<?php

namespace App\Repository;

use App\Models\Movie;

class MovieRepository extends BaseRepository implements MovieRepositoryInterface
{
    protected $model;

    public function __construct(Movie $model)
    {
        $this->model = $model;
    }
}
