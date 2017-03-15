<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
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

  public static function total($items){
    $total = 0;
    foreach ($items as $item) {
      $total += Item::find($item)->price;
    }

    $totalFormat = number_format($total, 2);

    return $totalFormat;
  }

  public static function items($items){
    $itemString = '';
    $itemsArray = [];
    
    // loops through all items, adds total to assoc array
    foreach ($items as $item) {
      $itemModel = Item::find($item);

      if(!isset($itemsArray[$itemModel->name])):
        $itemsArray[$itemModel->name] = 0;
      endif;
      $itemsArray[$itemModel->name]++;
    }

    // loops through assoc array, formats string
    foreach ($itemsArray as $key => $value) {
      $itemString .= $key.' x'.$value.', ';
    }
    return $itemString;
  }
}
