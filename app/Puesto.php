<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    public function empleados() {
        
       return $this->hasMany(Empleado::class);
}
}
