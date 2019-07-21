<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pranker extends Model
{
    function phone()
    {
        return $this->hasOne(Phone::class);
    }

    function posts()
    {
        return $this->hasMany(Post::class);
    }
}
