<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemsInventory extends Model
{
    //
    public function category()
    {
        return $this::belongsTo('\App\ItemsCategories','category_id');
    }
}
