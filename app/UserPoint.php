<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    protected $guarded = [];

    public function point(){
        return $this->belongsToMany(Point::class);

    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
