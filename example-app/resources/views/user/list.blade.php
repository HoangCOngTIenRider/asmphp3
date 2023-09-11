@extends('templates.layout')
@section('content')



<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">người dùng</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($user as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      @if($item->role==0)
      <td>admin</td>
      @elseif($item->role==1)
      <td>giảng viên</td>
      @else($item->role==2)
      <td>người dùng</td>
      @endif

      <td><a href="/user/delete/{{$item->id}}">xoa</a>///
      <a href="/user/edit/{{$item->id}}">sua</a></td>
    </tr>
    @endforeach
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
@endsection