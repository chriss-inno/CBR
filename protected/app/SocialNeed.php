<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNeed extends Model
{
    //
    public function beneficiary()
    {
        return $this::belongsTo('\App\Beneficiary','beneficiary_id','id');
    }
}
