@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Item Create Form</h1>
</div>

{{-- cmd htay ka Name(items:store) ko route nan call look tar 
method ka =POST --}}
<form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
{{--  --}}
@csrf

  <div class="form-group row {{$errors->has('codeno')? 'has-error':''}}">
    <label for="inputcode" class="col-sm-2 col-form-label">Code No</label>
    <div class="col-sm-5">
      <input type="number" name="codeno" class="form-control @error('title')is-invalid @enderror" id="inputcode">
      <span class="text-danger">{{$errors->first('codeno')}}</span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputname">
      <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputphoto" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" class="form-control" id="inputphoto">
      <span class="text-danger">{{$errors->first('photo')}}</span>
    </div>
  </div>

  <div class="form-group row {{$errors->has('price')? 'has-error':''}}">
    <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-5">
      <input type="number"  name="price" class="form-control" id="inputprice" required="Price field is required" readonly="gg">
      <span class="text-danger">{{$errors->first('price')}}</span>
    </div>
  </div>

  <div class="form-group row {{$errors->has('discount')? 'has-error':''}}">
    <label for="inputdiscount" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-5">
      <input type="number" name="discount" value="0" class="form-control" id="inputdiscount">
      <span class="text-danger">{{$errors->first('discount')}}</span>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputdescription">Description</label>
    <textarea class="form-control col-sm-5" name="description" id="inputdescription" rows="3"></textarea>
    <span class="text-danger">{{$errors->first('description')}}</span>
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
      <button type="submit" class="btn btn-primary">Create</button>
    </div>
  </div>
</form>
        
</div>

@endsection