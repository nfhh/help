<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function grandchildren()
    {
        return $this->children()->with('grandchildren');
    }

    public function nodes()
    {
        return $this->children()->with('nodes');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeRoots(Builder $builder)
    {
        $builder->where('parent_id', 0)->orderBy('sort', 'asc');
    }
}
