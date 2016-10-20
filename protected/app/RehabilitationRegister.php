<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RehabilitationRegister extends Model
{
    //
    public function client()
    {
        return $this::belongsTo('\App\Client','client_id','id');
    }
    public function progress()
    {
        return $this::hasMany('\App\RehabilitationProgress','rehabilitation_id','id');
    }
}
