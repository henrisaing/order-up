<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Auth;
class ItemController extends Controller
{
    //

  public function index(){
    $items = Auth::user()->items()->get();
    return view('items.index', [
      'items' => $items,
    ]);
  }

  public function new(){
    return view('items.new');
  }

  public function edit(Item $item){
    return view('items.edit', ['item' => $item]);
  }

  public function create(Request $request){
    Auth::user()->items()->create([
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
    ]);
    return redirect('/items');
  }

  public function update(Request $request, Item $item){
    $item->update([
      'name' => $request->name,
      'description' => $request->description,
      'price' => $request->price,
    ]);
    return redirect('/items');
  }

  public function destroy(Item $item){
    // redo delete to make more secure
    $item->delete();
    return redirect('/items');
  }
}
