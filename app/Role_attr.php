<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_attr extends Model
{
    //
    protected $fillable = ['role_id', 'type','label','attr_code'];

    //roles
    public function role(){
    	return $this->belongsTo('App\Role', 'role_id');
    }
    //roles_values
    public function role_attr_values(){
    	return $this->hasMany('App\Role_attr_value');
    }
}
