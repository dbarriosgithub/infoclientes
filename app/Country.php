<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primarykey = 'id';
    protected $table = 'countries';
    protected $guarded = ['id'];

    public function department(){
         return $this->belongsTo('App\Department');
    }
}
