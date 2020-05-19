<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function dir()
    {
        return $this->belongsTo(Dir::class);
    }
}
