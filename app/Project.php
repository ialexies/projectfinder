<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    //
    public function tags(){
		  return $this->belongsToMany('App\Tag');  //Take note of the belongsToMany
    }

    public function category(){
      return $this->hasOne('App\Category');
    }
    



}



