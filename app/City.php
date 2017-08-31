<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $primarykey='id';
  protected $table ='cities';
  protected $guarded=['id'];

  public function department(){
    return $this->hasMany('App\Department');
  }

}
