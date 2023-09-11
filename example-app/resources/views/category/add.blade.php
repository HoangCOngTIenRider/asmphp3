@extends('templates.layout')
@section('content')
<form action="{{ route('route_category_add') }}" method="POST">
@csrf

<div class="mb-3">
<label  class="form-label">Name</label>
<input type="name" class="form-control" name="name">
</div>
<button class="btn btn-success" type="submit">Thêm</button>
</form>
@endsection