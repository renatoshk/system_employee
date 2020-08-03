<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable =['message'];

    //user
    public function user(){
    	return $this->belongsTo('App\User');
    }

}
