<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      Orders
      <button class="lightbox-open btn btn-success" func="/order/new">+</button> 
    </div>
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>name</th>
            <th>items</th>
            <th>notes</th>
            <th>total</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($orders as $order): ?>
            <tr>
              <td>{{$order->name}}</td>
              <td>{{$order->items}}</td>
              <td>{{$order->notes}}</td>
              <td>{{$order->total}}</td>

              <td>
              <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">paid</button>
              <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">seen it</button>
              <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">ready</button>
              <button class="btn btn-default send" type="button" ffunc="/order/{{$order->id}}">recieved</button>
              </td>

            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection