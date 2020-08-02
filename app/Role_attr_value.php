<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_attr_value extends Model
{
    //
    protected $fillable = ['role_id','user_id','role_attr_id','attribute_value'];
    //users
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    //role
    public function role(){
    	return $this->belongsTo('App\Role', 'role_id');
    }
    //users
    public function role_attr(){
    	return $this->belongsTo('App\Role_attr', 'role_attr_id');
    }
}
