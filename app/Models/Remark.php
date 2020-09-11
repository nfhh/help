<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $guarded = [];

    public static function findOneBySlug($var)
    {
        return self::where('var', $var)->first();
    }
}
