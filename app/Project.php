<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    //
    // public function tags(){
		//   return $this->belongsToMany('App\Tag');  //Take note of the belongsToMany
    // }

    // public function category(){
    //   return $this->hasOne('App\Category');
    // }
    
    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function company(){
      return $this->belongsTo('App\Company');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }

}



