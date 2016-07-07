<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RehabilitationRegister extends Model
{
    //
    public function client()
    {
        return $this::belongsTo('\App\Client','file_no','file_number');
    }
}
