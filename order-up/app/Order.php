<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'name',
    'items',
    'notes',
    'total',
    'paid',
    'in_progress',
    'ready',
    'recieved',
    'status',
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }
}
