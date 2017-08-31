<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'clients';
    protected $fillable = ['cupo','saldocupo','porcentajevisitas','persona_id'];
    protected $guarded = ['id'];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }    
}
