<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public static function findAllToOrder()
    {
        return orderFormat(self::findAll());
    }

    public static function findAllToTree()
    {
        return layerFormat(self::findAll());
    }

    public static function findAll()
    {
        return self::orderBy('sort', 'desc')->orderBy('id', 'asc')->get()->toArray();
    }

    public static function findOneByVar($var)
    {
        return self::where('var', $var)->first();
    }
}
