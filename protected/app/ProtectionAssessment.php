<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtectionAssessment extends Model
{
    //
    public function client()
    {
        return $this::belongsTo('\App\Client','client_id','id');
    }
    public function needs()
    {
        return $this::hasMany('\App\ProtectionAssessmentNeed','assessment_id');
    }
}
