<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProspect extends Model
{
    public function prospecto() {
        return $this->HasMany(Prospecto::class, 'statusprospect_id');
    }
}
