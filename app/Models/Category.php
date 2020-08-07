<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function articleCount()
    {
        return $this->hasMany('App\Models\Article', 'category_id', 'id')
            ->where('status', 1)
            ->count();
    }
}
