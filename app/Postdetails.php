<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postdetails extends Model
{
    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
