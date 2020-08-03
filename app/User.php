<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','image_id','dep_id','username','surname','name', 'email', 'password'
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

    //role
    public function role(){
        return $this->belongsTo('App\Role', 'role_id');
    }
    //image
    public function image(){
        return $this->belongsTo('App\ImageUser', 'image_id');
    }

  
     // dep
    public function dep(){
        return $this->belongsTo('App\Dep', 'dep_id');
    }

    //role_attr_values
    public function role_attr_values(){
        return $this->hasMany('App\Role_attr_value');
    }
    //check admin
    public function is_Admin(){
        if($this->role->name == 'Admin'){
            return true;
        }
        else {
            return false;
        }
    }
    //messages
    public function messages(){
        return $this->hasMany('App\Message');
    }
}
