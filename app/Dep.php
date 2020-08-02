<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dep extends Model
{
    //
    protected $fillable = ['primary_dep_id', 'name'];

    // parent dep relationship
    public function parent_dep(){
    	return $this->belongsTo('App\Primary_dep', 'primary_dep_id');
    }
    //users
    public function users(){
    	return $this->hasMany('App\User');
    }
}
