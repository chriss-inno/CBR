<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrthopedicServices extends Model
{
    //
    public function client()
    {
        return $this::belongsTo('\App\Client','file_no','file_number');
    }
    public function items()
    {
        return $this::hasMany('\App\OrthopedicServicesItems','ors_id');
    }
    
}
