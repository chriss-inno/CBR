<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveliHoodsMaterial extends Model
{
    //
    public function item()
    {
        return $this::belongsTo('\App\ItemsInventory','item_id');
    }
    public function client()
    {
        return $this::belongsTo('\App\LiveliHoodsClient','client_id');
    }
    public function cgroup()
    {
        return $this::belongsTo('\App\LiveliHoodsGroup','group_id');
    }
}
