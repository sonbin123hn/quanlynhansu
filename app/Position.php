<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';
    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

    public function position_User()
    {
        return $this->hasMany('App\User');
    }
}
