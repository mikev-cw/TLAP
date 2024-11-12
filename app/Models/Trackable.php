<?php

namespace App\Models;

class Trackable extends baseModel
{
    protected $fillable = ['uid', 'user_id', 'name'];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
