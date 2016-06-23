<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function camp()
    {
        return $this::belongsTo('\App\Camp','camp_id');
    }
    public function centre()
    {
        return $this::belongsTo('\App\Centre','center_id');
    }
    public function assessment()
    {
        return $this::hasOne('\App\ClientAssessment','client_id','id');
    }
}
