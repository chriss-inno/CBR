<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    //
    public function camp()
    {
        return $this::belongsTo('\App\Camp','camp_id');
    }

}
