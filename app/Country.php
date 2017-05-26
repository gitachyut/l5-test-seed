<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function users(){
      return $this->hasMany('App\User');
    }

    public function posts(){
      return $this->hasManyThrough('App\Article','App\User','country_id','user_id','id');
    }
}
