<!-- resources/views/items/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      Items
      <button class="lightbox-open btn btn-success" func="/item/new">+</button> 
    </div>
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($items as $item): ?>
            <tr>
              <td><a func="/item/{{$item->id}}/edit" class="lightbox-open">{{$item->name}}</a></td>
              <td>{{$item->description}}</td>
              <td>{{$item->price}}</td>
              <td><a href="{{url('/item/'.$item->id.'/destroy')}}">
              <button class="btn btn-danger">remove</button>
              <!-- not secure, redo as form with token later -->
              </a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection