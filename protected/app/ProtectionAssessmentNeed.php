<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtectionAssessmentNeed extends Model
{
    //
    public function assessment()
    {
        return $this::belongsTo('\App\ProtectionAssessment','assessment_id','id');
    }
}
