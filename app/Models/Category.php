<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

  //die relation zur item tabelle
  public function item()
  {
    //belongs to, Category hat viele Items
    return $this->belongsTo(Item::class);
  }
}
