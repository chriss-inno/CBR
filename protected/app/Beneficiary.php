<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    //
    public function socialneeds()
    {
        return $this::hasMany('\App\SocialNeed','beneficiary_id','id');
    }
}
