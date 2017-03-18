<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Item;
use Carbon\Carbon;

class OrderController extends Controller
{
    //

  public function index(){
    // $orders = Auth::user()->orders()->get();
    $orders = Auth::user()->orders()->where('created_at', '>', Carbon::now()->subDay())->get();
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
    $items = Order::items($request->input('items'));
    $total = Order::total($request->input('items'));
    Auth::user()->orders()->create([
      'name' => $request->name,
      'notes' => $request->notes,
      'items' => $items,
      'total' => $total,
      'paid' => false,
      'in_progress' => false,
      'ready' => false,
      'recieved' => false,
      'status' => 'pending',
    ]);
    return redirect('/orders');
  }

  public function paid(Order $order){
    $order->update([
      'paid' => true,
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
      'orders' => Auth::user()->orders()->where('created_at', '>', Carbon::now()->subDay())->get()
    ]);
  }

  public function getActive(){
    return view('orders.active', [
      'orders' => $orders = Auth::user()->orders()->where('created_at', '>', Carbon::now()->subDay())->get()
    ]);
  }

  public function getReady(){
    return view('orders.ready', [
      'orders' => $orders = Auth::user()->orders()->where('created_at', '>', Carbon::now()->subDay())->get()
    ]);
  }

  
}
