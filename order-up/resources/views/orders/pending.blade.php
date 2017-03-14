<!-- start Pending orders -->
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
      <?php if ($order->in_progress == false && $order->status == 'pending'): ?>
      <tr>
        <td>{{$order->name}}</td>
        <td>{{$order->items}}</td>
        <td>{{$order->notes}}</td>
        <td>{{$order->total}}</td>

        <td>
        <button class="btn btn-default send" type="button" func="/order/{{$order->id}}">paid</button>

        {!! Form::open(['url' => '/order/'.$order->id.'/active']) !!}
          <button class="btn btn-default" type="submit">seen it</button>
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

<!-- end Pending -->