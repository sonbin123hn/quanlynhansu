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
        return $value;
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

    public function user_Department()
    {
        return $this->belongsTo('App\Department','department_id');
    }

    public function user_Position()
    {
        return $this->belongsTo('App\Position','position_id');
    }

    public static function searchUser($request = null, $limit = 10)
    {
        $where = [];
        $name = $request->name;
        $position_id = $request->position_id;
        $department_id = $request->department_id;
        if(!empty($name)){
            $where[] = ['name', "like", '%' . mb_strtolower($name, 'UTF-8') . '%'];
        }
        if(!empty($position_id) && is_numeric($position_id)){
            $where[] = ['position_id', "=", $position_id];
        }
        if(!empty($department_id && is_numeric($department_id))){
            $where[] = ['department_id', "=",$department_id];
        }
        
        $user = User::where($where)->orderBy('id', 'DESC')->paginate($limit);
        return $user;
    }


}
