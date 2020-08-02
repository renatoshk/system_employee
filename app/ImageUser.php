<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUser extends Model
{
    //
    protected $fillable = ['image'];

    //users
    public function users(){
    	return $this->hasMany('App\User');
    }
}
