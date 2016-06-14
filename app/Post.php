<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function details()
    {
        return $this->hasMany('App\Postdetails');
    }
}
