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
    public function supports()
    {
        return $this::hasMany('\App\MateriaSupport','beneficiary_id','id');
    }
}
