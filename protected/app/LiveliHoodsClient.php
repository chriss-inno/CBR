<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveliHoodsClient extends Model
{
    //
    public function LiveliHoodGroup()
    {
        return $this::belongsTo('\App\LiveliHoodsGroup','group');
    }
}
