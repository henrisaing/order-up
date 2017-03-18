<!-- start Pending orders -->
<table class="table table-responsive">
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
      <?php if ($order->paid): ?>
        <tr class="success">
      <?php else: ?>
        <tr class="warning">
      <?php endif; ?>
        <td>{{$order->name}}</td>
        <td class="items">{{$order->items}}</td>
        <td>{{$order->notes}}</td>
        <td>{{$order->total}}</td>

        <td>
        {!! Form::open(['url' => '/order/'.$order->id.'/paid']) !!}
          <button class="btn btn-success" type="submit">
            paid
          </button>
        {!! Form::close() !!}

        {!! Form::open(['url' => '/order/'.$order->id.'/active']) !!}
          <button class="btn btn-info" type="submit">
            seen
          </button>
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