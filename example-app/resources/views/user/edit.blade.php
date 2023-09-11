@extends('templates.layout')
@section('content')
<form action="{{ route('route_user_edit',['id'=>$user->id]) }}" method="POST">
@csrf
<div class="mb-3">
<label  class="form-label">Email</label>
<input type="name" selected class="form-control" value="{{$user->email}}"  name="name">
</div>
<div class="mb-3">
<label  class="form-label">Name</label>
<input type="name" class="form-control" value="{{$user->name}}"  name="name">
</div>
@if($user->role==0)
<select name="role" id="">
    <option selected value="0">admin</option>
    <option value="1">giảng viên</option>
    <option value="2">người dùng</option>
</select><br />
@elseif($user->role==1)
<select name="role" id="">
    <option  value="0">admin</option>
    <option selected value="1">giảng viên</option>
    <option value="2">người dùng</option>
</select><br>
@elseif($user->role==2)
<select name="role" id="">
    <option value="0">admin</option>
    <option value="1">giảng viên</option>
    <option selected value="2">người dùng</option>
</select><br />
@endif
<button class="btn btn-success" type="submit">sửa</button>
</form>
@endsection