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

<div id="update">
  
</div>
      <!-- start Active orders -->
      <div class="panel panel-primary">
        <div class="panel-heading">Active Orders</div>
        <div class="panel-body" id="active">
          @component('orders.active', ['orders' => $orders])

          @endcomponent
        </div>
      </div>
      <!-- end Active -->
    
      <!-- start Pending orders -->
      <div class="panel panel-warning">
        <div class="panel-heading">Pending Orders</div>
        <div class="panel-body" id="pending">
          @component('orders.pending', ['orders' => $orders])

          @endcomponent
        </div>
      </div>
      <!-- end Pending -->

      <!-- start pickup orders -->
      <div class="panel panel-info">
        <div class="panel-heading">Pickup Ready</div>
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
                <?php if ($order->ready && $order->status == 'ready'): ?>
                <tr>
                  <td>{{$order->name}}</td>
                  <td class="items">{{$order->items}}</td>
                  <td>{{$order->notes}}</td>
                  <td>{{$order->total}}</td>

                  <td>
                  <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">paid</button>
                  
                  {!! Form::open(['url' => '/order/'.$order->id.'/completed']) !!}
                    <button class="btn btn-success" type="submit" >recieved</button>
                  {!! Form::close() !!}

                  {!! Form::open(['url' => '/order/'.$order->id.'/cancel']) !!}
                    <button class="btn btn-danger" type="submit">cancel</button>
                  {!! Form::close() !!}
                  </td>
                </tr>
                  
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- end completed -->    

      <!-- start completed orders -->
      <div class="panel panel-success">
        <div class="panel-heading">Completed Orders</div>
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
              <?php foreach ($orders->reverse() as $order): ?>
                <?php if ($order->recieved && $order->status == 'completed'): ?>
                <tr>
                  <td>{{$order->name}}</td>
                  <td class="items">{{$order->items}}</td>
                  <td>{{$order->notes}}</td>
                  <td>{{$order->total}}</td>

                  <td>
                  <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">paid</button>
                  <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">seen it</button>
                  <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">ready</button>
                  <button class="btn btn-default send" type="button" ffunc="/order/{{$order->id}}">recieved</button>
                  </td>
                </tr>
                  
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- end completed -->

      <!-- start Cancelled orders -->
      <div class="panel panel-danger">
        <div class="panel-heading">Cancelled Orders</div>
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
              <?php foreach ($orders->reverse() as $order): ?>
                <?php if ($order->status == 'cancelled'): ?>
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
                  
                <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- end completed -->
    </div>

  </div>
</div>

<script type="text/javascript">
    var pending = setInterval(update, 10000);

    function update(){
      $.get('/orders/pending', function(data){
        $('#pending').html(data);
      });
      $.get('/orders/active', function(data){
        $('#active').html(data);
      });
    }
</script>
@endsection