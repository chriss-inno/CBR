<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialSupport extends Model
{
    //
    public function distributions()
    {
        return $this::hasMany('\App\MaterialSupportItem','support_id');
    }
}
