<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $primaryKey = 'id';
    protected $table='people';
    protected $fillable =['nit','nombrecompleto','direccion','telefono','ciudad_id'];
    protected $guarded =['id'];

    public function client()
    {
        return $this->hasOne('App\Client');
    }
}
