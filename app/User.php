<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'id',
        'name',
        'email',
        'password',
        'avatar',
        'email_verified_at',
        'phone',
        'birthday',
        'address',
        'cmnd',
        'place_of_origin',
        'ethnicity',
        'sobhxh',
        'gender',
        'position_id',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value)
    {
     if (strpos($value, 'https://') !== false || strpos($value, 'http://') !== false)
     {
      return $value;
     }
     return asset('storage/' . $value);
    }

    public function permissions(){

        return $this->belongsToMany(Permission::class);

    }

    public function roles(){

        return $this->belongsToMany(Role::class);

    }

    public function userHasRole($role_name){
        foreach($this->roles as $role){
            if(Str::lower($role_name) == Str::lower($role->name))
                return true;
        }

        return false;
    }
}
