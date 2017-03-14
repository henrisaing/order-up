<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Item;

class OrderController extends Controller
{
    //

  public function index(){
    $orders = Auth::user()->orders()->get();
    return view('orders.index', [
      'orders' => $orders,
    ]);
  }

  public function new(){
    $items = Auth::user()->items()->get();
    $itemsList = $items->pluck('name', 'id');
    return view('orders.new', [
      'items' => $items,
      'itemsList' => $itemsList,
    ]);
  }

  public function create(Request $request){
    Auth::user()->orders()->create([
      'name' => $request->name,
      'notes' => $request->notes,
      'items' => 'item placeholder',
      'total' => 'total placeholder',
      'paid' => false,
      'in_progress' => false,
      'ready' => false,
      'recieved' => false,
      'status' => 'pending',
    ]);
    return redirect('/orders');
  }

  public function active(Order $order){
    $order->update([
      'in_progress' => true,
      'status' => 'active'
    ]);
    return redirect('/orders');
  }

  public function pickUp(Order $order){
    $order->update([
      'ready' => true,
      'status' => 'ready'
    ]);
    return redirect('/orders');
  }

  public function completed(Order $order){
    $order->update([
      'recieved' => true,
      'status' => 'completed'
    ]);
    return redirect('/orders');
  }

  public function cancelled(Order $order){
    $order->update([
      'status' => 'cancelled'
    ]);
    return redirect('/orders');
  }

  public function pending(){
    return view('orders.pending', [
      'orders' =>     $orders = Auth::user()->orders()->get()
    ]);
  }
}
