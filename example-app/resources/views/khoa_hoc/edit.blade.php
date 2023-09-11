@extends('templates.layout')
@section('content')
<h1>Sửa khóa học</h1>
<form action="{{ route('route_khoa_hoc_edit',['id'=>$khoahoc->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">  
        <label class="form-label">Tên khóa hoc</label>
        <input type="text" class="form-control" name="name" value="{{$khoahoc->name}}">
    </div>
    <div class="mb-3">  
        <label class="form-label">Giá</label>
        <input type="text" class="form-control" name="price" value="{{$khoahoc->price}}">
    </div>
    <div class="mb-3">  
        <label class="form-label">Mô tả</label>
        <input type="text" class="form-control" name="describe" value="{{$khoahoc->describe}}">
    </div>
    <div class="col-md-9 col-sm-8">
        <div class="row">
            <div class="col-xs-6">
                <img id="mat_truoc_preview" src="{{ $khoahoc->image?''.Storage::url($khoahoc->image):''}}" alt="your image"
                     style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                <input type="file" name="image" accept="image/*"
                       class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                <label for="cmt_truoc">Mặt trước</label><br/>
            </div>
        </div>
    </div>
    <div class="mb-3">  
        <label class="form-label">Chương trình học</label>
        <input type="text" class="form-control" name="process" value="{{$khoahoc->process}}">
    </div>   <div class="mb-3">  
        <label class="form-label">Loại khóa học</label>
        



<select name="id_category" id="" >
@foreach ($category as $item)
@if($khoahoc->id_category==$item->id)
<option selected value="{{$item->id}}">{{$item->name}}</option>
@else
<option value="{{$item->id}}">{{$item->name}}</option>
@endif
@endforeach
</select>



    </div>
    <button class="btn btn-success" type="submit">Thêm</button>
</form> 
@endsection