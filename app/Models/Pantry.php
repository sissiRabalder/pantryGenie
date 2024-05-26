<?php

namespace App\Models;

use App\Models\User;
use App\Models\Item;
use Illuminate\Database\Eloquent\Model;


class Pantry extends Model
{

    //die relation zur user tabelle
    //das muss auch in der users tabelle sein, da wir auch einen user haben möche der die pantry fetcht
   public function user() {
    //hasOne ist hat genau 1, also jede pantry ist genau einem User zugeordnet!
    return $this->belongsTo(User::class);

   }

   public function Items() {
    
    return $this->hasMany(Item::class);
   }
}
