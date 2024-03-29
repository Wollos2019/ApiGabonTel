<?php


namespace App\Scopes\Rh;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class EmployeeScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('isAdmin','=',0);
    }
}
