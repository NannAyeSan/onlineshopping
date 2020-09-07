@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Subcategory Create Form</h1>
</div>

{{-- cmd htay ka Name(items:store) ko route nan call look tar 
method ka =POST --}}
<form action="{{route('subcategories.store')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputname">
      <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
  </div>

  
  </div>
  <div class="form-group row">
    <label for="inputid" class="col-sm-2 col-form-label">Category Name</label>
    <div class="col-sm-5">
      <select class="form-control form-control-md" id="input
    Subcategory" name="category_id">
      <optgroup label="Choose Category">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </optgroup>
    </select>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </div>
</form>
        
</div>

@endsection