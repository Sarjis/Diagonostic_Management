<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    function type()
    {
        return $this->belongsTo(TestType::class, 'test_type_id');
    }
}
