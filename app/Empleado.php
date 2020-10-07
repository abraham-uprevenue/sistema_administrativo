<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nacimiento', 'ingreso', 'puesto_id'];
    protected $casts = ['nacimiento' => 'date',
                        'ingreso' => 'date'    
    ];

    public function user() {
            return $this->belongsTo(User::class);
    }

    public function puesto() {
        return $this->belongsTo(Puesto::class); }

        public function pagos() {
        
            return $this->HasMany(Pago::class);
     }

}
