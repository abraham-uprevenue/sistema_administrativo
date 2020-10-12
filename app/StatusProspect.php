<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProspect extends Model
{
    public function prospectos() {
        return $this->HasMany(Prospecto::class);
    }
}
