<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsDisbursement extends Model
{
    //
    public function item()
    {
        return $this::belongsTo('\App\ItemsInventory','item_id');
    }
    public function client()
    {
        return $this::belongsTo('\App\Client','client_id');
    }
    public function beneficiary()
    {
        return $this::belongsTo('\App\Beneficiary','client_id');
    }
}
