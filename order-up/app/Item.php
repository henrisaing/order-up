<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
  protected $fillable = [
    'name',
    'description',
    'price',
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }
}
