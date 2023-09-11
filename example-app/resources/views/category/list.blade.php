@extends('templates.layout')
@section('content')
<button  class="btn btn-primary ml-5 "><a style="text-decoration: none; color: white;" href="{{route('route_category_add')}}">New Category</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Stt</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($category as $act)
    <tr>
      <th scope="row">{{$act->id}}</th>
      <td>{{$act->name}}</td>
      <td><a href="/category/edit/{{$act->id}}">suawr</a></td>
      <td><a href="/category/delete/{{$act->id}}">xoa</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection