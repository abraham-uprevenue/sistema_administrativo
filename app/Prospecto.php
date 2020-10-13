<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $casts = ['fecha' => 'date'];

    public function statusprospect() 
    {
        return $this->belongsTo(StatusProspect::class);
    }
}
