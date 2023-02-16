<?php

namespace App\Repository;

use App\Repository\BaseEloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseEloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allTrashed() //sadece softdelete olan verileri döndürür
    {
        return $this->model->onlyTrashed()->get();
    }

    public function allWithTrashed() //tüm verileri döndürür(silinenler dahil)
    {
        return $this->model->withTrashed()->get();
    }

    public function findById($modelId)
    {
        return $this->model->find($modelId);
    }

    public function findTrashedById($modelId) //tüm veriler içerisinde bulur(silinenler dahil)
    {
        return $this->model->withTrashed()->find($modelId);
    }

    public function findOnlyTrashedById($modelId) //sadece silinen veriler içerisinde bulur
    {
        return $this->model->onlyTrashed()->find($modelId);
    }

    public function create($datas)
    {
        return $this->model->create($datas);
    }

    public function update($modelId, $datas)
    {
        $model = $this->findById($modelId);
        return $model->update($datas);
    }

    public function deleteById($modelId)
    {
        return $this->findById($modelId)->delete();
    }

    public function restoreById($modelId) //softdelete olan veriyi restore eder
    {
        return $this->findOnlyTrashedById($modelId);
    }

    public function forceDeleteById($modelId) //veriyi kalıcı siler
    {
        return $this->findTrashedById($modelId)->forceDelete();
    }
}