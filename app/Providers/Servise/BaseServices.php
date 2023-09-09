<?php

namespace App\Providers\Servise;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseServices
{

    /**
     * @return Model|mixed
     */
    abstract protected function getModel():mixed;

    public function getAll(array $filter): Builder
    {
        return $this->getModel()::where($filter);
    }

    /**
     * @param Builder $entity
     * @param array $relation
     * @return Builder
     */
    public function applyRelation(Builder $entity, array $relation): Builder
    {
        return $entity->with($relation);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed
    {
        return $this->getModel()::find($id);
    }
}
