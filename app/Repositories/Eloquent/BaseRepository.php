<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function store(array $data): ?Model
    {
        $model = $this->model->create($data);
        return $model->fresh();
    }

}
