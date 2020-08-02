<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['name'];
    
    //users
    public function users(){
    	return $this->hasMany('App\User');
    }
    //role_attrs
    public function role_attrs(){
    	return $this->hasMany('Role_attr');
    }
    //role_attr_values
    public function role_attr_values(){
    	return $this->hasMany('Role_attr_value');
    }
}
