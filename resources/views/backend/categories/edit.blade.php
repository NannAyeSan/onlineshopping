@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Category Edit Form</h1>
</div>

{{-- cmd htay ka Name(items:store) ko route nan call look tar 
method ka =POST --}}
<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
{{--  --}}
@csrf
{{-- items.update ya cmd yat Method PUT ko call tar--}}
@method('PUT')


  <div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputname" value="{{$category->name}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputphoto" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" class="form-control" id="inputphoto">
      <img src="{{asset($category->photo)}}" class="img-fluid w-25">
      {{--if photo ko ma change, other ko change tay khar oldphoto have nay ya may  --}}
      <input type="hidden" name="oldphoto" value="{{$category->photo}}">
    </div>
  </div>

  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
        
</div>

@endsection