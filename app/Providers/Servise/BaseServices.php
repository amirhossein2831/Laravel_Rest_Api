<?php

namespace App\Providers\Servise;

use App\Filter\V1\CustomerFilter;
use App\Models\Customer;
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

    public function applyRelation(Builder $entity, array $relation): Builder
    {
        return $entity->with($relation);
    }

    public function getById(int $id)
    {
        return $this->getModel()::find($id);
    }
}
