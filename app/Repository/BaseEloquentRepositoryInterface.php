<?php

namespace App\Repository;

interface BaseEloquentRepositoryInterface
{
    public function all();

    public function allTrashed();

    public function allWithTrashed();

    public function findById($modelId);

    public function findTrashedById($modelId);

    public function findOnlyTrashedById($modelId);

    public function create($datas);

    public function update($modelId, $datas);

    public function deleteById($modelId);

    public function restoreById($modelId);

    public function forceDeleteById($modelId);
}
