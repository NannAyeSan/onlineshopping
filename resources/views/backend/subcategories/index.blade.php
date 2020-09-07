@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
    	    <div class="col-md-12">
                <h1 class="h3 mb-0 text-gray-800">Subcategory List</h1>
                {{--Add New button click yin /under items folder ka create ko go may  --}}
                <a href="{{route('subcategories.create')}}" class="btn btn-success">Add New</a>
            </div>
        </div>
    </div>


<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Category Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
   
   @php $i=1; @endphp
		@foreach($subcategories as $subcategory)
		<tr>
			<td>{{$i++}}</td>

			
			<td>{{$subcategory->name}}</td>
            <td>{{$subcategory->category->name}}</td>
			
			<td>
				

				{{-- items.edit ka cmd ka Name / $item->id ka bay id ko edit look mar lay --}}
				<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-secondary">Edit</a>

				<a href="{{route('subcategories.show',$subcategory->id)}}" class="btn btn-primary">Detail</a>

				<form action="{{route('subcategories.destroy',$subcategory->id)}}" method="post" onsubmit="return confirm('Are you Sure want to Delete!')" class="d-inline-block">
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