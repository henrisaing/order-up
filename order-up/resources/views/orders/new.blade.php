<!-- resources/views/items/new.blade.php -->
{!! Form::open(['url' => '/order/create']) !!}


<input class="form-control" type="text" name="name" required placeholder="name"/>

<textarea class="form-control" name="notes" rows="2" placeholder="notes"></textarea>

<!-- <label>price</label><input type="text" name="name" /> -->
<button id="add" type='button'>add item</button>
<button id="reset" type='button'>reset items</button>
<div id="items">
  {!! Form::select('items[]', $itemsList, null, [
    'class' => ''
  ]) !!}
</div>

<!-- 
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
  <div class="input-group-addon">$</div>
  <input type="text" class="form-control" name="total" placeholder="total">
</div> -->

<button type="submit" class="btn btn-success lb-close">create order</button>

{!! Form::close() !!}

<script type="text/javascript">
  $('document').ready(function(){
    var itemDropdown = $('#items').html();

    $('button#add').click(function(){
      $('#items').prepend(itemDropdown);
    });

    $('button#reset').click(function(){
      $('#items').html(itemDropdown);
    });
  });
</script>