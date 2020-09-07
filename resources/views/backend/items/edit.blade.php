@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>
</div>

{{-- cmd htay ka Name(items:store) ko route nan call look tar 
method ka =POST --}}
<form action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
{{--  --}}
@csrf
{{-- items.update ya cmd yat Method PUT ko call tar--}}
@method('PUT')

  <div class="form-group row">
    <label for="inputcode" class="col-sm-2 col-form-label">Code No</label>
    <div class="col-sm-5">
      <input type="number" name="codeno" class="form-control" id="inputcode" value="{{$item->codeno}}" readonly="readonly">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputname" value="{{$item->name}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputphoto" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" class="form-control" id="inputphoto">
      <img src="{{asset($item->photo)}}" class="img-fluid w-25">
      {{--if photo ko ma change, other ko change tay khar oldphoto have nay ya may  --}}
      <input type="hidden" name="oldphoto" value="{{$item->photo}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-5">
      <input type="number"  name="price" class="form-control" id="inputprice" required="Price field is required" value="{{$item->price}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputdiscount" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-5">
      <input type="number" name="discount" class="form-control" id="inputdiscount" value="{{$item->discount}}">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdescription">Description</label>
    <textarea class="form-control col-sm-5" name="description" id="inputdescription" rows="3">{{$item->description}}</textarea>
  </div>

{{-- create form mar brand table htay ka name tay retrieve look tar --}}
  <div class="form-group row">
  	<select class="form-control form-control-md" id="inputBrand" name="brand">
  		<optgroup label="Choose Brand">
  			@foreach($brands as $brand)
  			<option value="{{$brand->id}}">{{$brand->name}}</option>
  			@endforeach
  		</optgroup>
  	</select>
  </div>

{{-- create form mar subcategory table htay ka name tay retrieve look tar --}}
  <div class="form-group row">
  	<select class="form-control form-control-md" id="input
  	Subcategory" name="subcategory">
  		<optgroup label="Choose Subcategory">
  			@foreach($subcategories as $subcategory)
  			<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
  			@endforeach
  		</optgroup>
  	</select>
  </div>


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
        
</div>

@endsection