<?php

namespace App\Models;

use App\Models\Pantry;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use HasFactory;



class Item extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'weight',
    'unit',
    'expiry_date',
    'pantry_id',
  ];
  //die relation zur pantry tabelle
  public function pantry()
  {
    //hasOne ist hat genau 1, also jedes Item ist genau einer Pantry zugeordnet!
    return $this->belongsTo(Pantry::class);
  }
  
  //die relation zur pantry tabelle
  public function category()
  {
    //hasOne jedes Item ist genau einer Kategorie zugeordnet
    return $this->hasOne(Category::class);
  }
 
}
