<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RehabilitationProgress extends Model
{
    //
    public function rservice()
    {
        return $this::belongsTo('\App\RehabilitationRegister','rehabilitation_id','id');
    }
}
