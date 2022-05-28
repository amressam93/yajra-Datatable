<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProductScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('lang_id',1);
    }
}
