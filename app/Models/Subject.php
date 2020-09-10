<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subject extends Model
{
    protected $guarded = [];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeRoots(Builder $builder)
    {
        $builder->where('parent_id', 0)->orderBy('sort', 'asc');
    }

    public static function findOneByVar($var)
    {
        return self::where('var', $var)->first();
    }
}
