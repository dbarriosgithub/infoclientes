<?php

namespace App;




use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $primarykey = 'id';
     protected $table = 'departments';
     protected $guarded = ['id'];

     public function country(){
        return $this->hasMany('App\Country');
     }

     public function city(){
         return $this->belongsTo('App\City');
     }
}
