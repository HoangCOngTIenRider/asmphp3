@extends('templates.layout')
@section('content')


<button  class="btn btn-primary ml-5 "><a style="text-decoration: none; color: white;" href="{{route('route_khoa_hoc_add')}}">New Khóa học</a></button>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Chương Trình</th>
      <th scope="col">Anh</th>
      <th scope="col">Danh mục</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($category as $item)
    <tr>
      <th scope="row">{{$item->idKH}}</th>
      <td>{{$item->nameKH}}</td>
      <td>{{$item->price}}</td>
      <td>{{$item->describe}}</td>
      <td>{{$item->process}}</td>
      <td><img src="{{ $item->image?''.Storage::url($item->image):''}}" style="width: 100px" /></td>
      <td><option value="{{$item->id}}">{{$item->name}}</option></td>
      <td><button type="button" class="btn btn-danger"><a style="text-decoration: none; color:white" href="/khoa_hoc/delete/{{$item->idKH}}">Xóa</a></button></td>
      <td><button type="button" class="btn btn-success"><a style="text-decoration: none; color:white" href="/khoa_hoc/edit/{{$item->idKH}}">sửa</a></button></td>
      
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