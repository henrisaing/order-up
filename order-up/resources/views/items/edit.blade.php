<!-- resources/views/items/new.blade.php -->
{!! Form::open(['url' => '/item/'.$item->id.'/update']) !!}


<input class="form-control" type="text" name="name" required placeholder="name" value="{{$item->name}}"/>

<textarea class="form-control" name="description" rows="3" placeholder="description">{{$item->description}}</textarea>

<!-- <label>price</label><input type="text" name="name" /> -->

<div class="input-group mb-2 mr-sm-2 mb-sm-0">
  <div class="input-group-addon">$</div>
  <input type="text" class="form-control" name="price" placeholder="price" value="{{$item->price}}">
</div>

<button type="submit" class="btn btn-success lb-close">save changes</button>

{!! Form::close() !!}