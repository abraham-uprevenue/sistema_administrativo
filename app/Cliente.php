<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function proyecto() {
        return $this->HasMany(Proyecto::class);
    }

    public function comment() {
        return $this->HasMany(Comment::class);
    }
}
