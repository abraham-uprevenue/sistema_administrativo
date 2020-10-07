<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $casts = ['fecha_inicio' => 'date', 'fecha_entrega' => 'date']; 
    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
