<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProtectionAssessment extends Model
{
    //
   
	public function beneficiary()
    {
        return $this::belongsTo('\App\Beneficiary','beneficiary_id','id');
    }
    public function needs()
    {
        return $this::hasMany('\App\ProtectionAssessmentNeed','assessment_id');
    }
}
