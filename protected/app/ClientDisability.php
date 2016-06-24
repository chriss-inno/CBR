<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDisability extends Model
{
    //
    public  function disability()
    {
        return $this::belongsTo('\App\Disability','category_id');
    }
    public function client()
    {
        return $this::belongsTo('\App\Client','client_id');
    }
}
