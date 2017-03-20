<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialSupportItem extends Model
{
    //
    public function beneficiary()
    {
        return $this::belongsTo('\App\Beneficiary','beneficiary_id');
    }
    public function item()
    {
        return $this::belongsTo('\App\ItemsInventory','item_id');
    }
    public function distribution()
    {
        return $this::belongsTo('\App\MaterialSupport','support_id');
    }
}
