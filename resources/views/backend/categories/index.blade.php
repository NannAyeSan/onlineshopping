@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
    	    <div class="col-md-12">
                <h1 class="h3 mb-0 text-gray-800">Category List</h1>
                {{--Add New button click yin /under items folder ka create ko go may  --}}
                <a href="{{route('categories.create')}}" class="btn btn-success">Add New</a>
            </div>
        </div>
    </div>


<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>No.</th>
			
			<th>Name</th>
			<th>Photo</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody>
   
   @php $i=1; @endphp
		@foreach($categories as $category)
		<tr>
			<td>{{$i++}}</td>
			
			<td>{{$category->name}}</td>
			<th><img src="{{asset($category->photo)}}" class="img-fluid w-25"></th>
			
			<td>
				{{-- <a href="" class="btn btn-success">Delete</a> --}}

				{{-- items.edit ka cmd ka Name / $item->id ka bay id ko edit look mar lay --}}
				<a href="{{route('categories.edit',$category->id)}}" class="btn btn-secondary">Edit</a>

				{{-- <a href="" class="btn btn-success">Detail</a> --}}
				<a href="{{route('categories.show',$category->id)}}" class="btn btn-primary">Detail</a>

				<form action="{{route('categories.destroy',$category->id)}}" method="post" onsubmit="return confirm('Are you Sure want to Delete!')" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
		    </td>
		</tr>
       @endforeach

	</tbody>
</table>
</div>
@endsection