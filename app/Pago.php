<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

    protected $casts = ['fecha' => 'date'];

    public function empleado() {
        return $this->belongsTo(Empleado::class);
}
}
