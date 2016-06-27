<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PSNAssessment extends Model
{
    //
    public function services()
    {
        return $this::hasMany('\App\PSNAssistanceServices','psn_id','id');
    }
    public function cReview()
    {
        return $this::hasOne('\App\PSNCases','psn_id','id');
    }

    public function client()
    {
        return $this::belongsTo('\App\Client','client_id');
    }
}
