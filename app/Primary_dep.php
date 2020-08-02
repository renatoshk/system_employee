<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Primary_dep extends Model
{
    //
    protected $fillable = ['name'];

    //deps
    public function deps(){
    	return $this->hasMany('App\Dep');
    }
    //user
    public function users(){
    	return $this->hasMany('App\User');
    }
}
