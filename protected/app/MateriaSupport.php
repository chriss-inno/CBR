<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaSupport extends Model
{
    //
    public function beneficiary()
    {
        return $this::belongsTo('\App\Beneficiary','progress_number','progress_number');
    }
}
