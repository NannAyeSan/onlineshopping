@extends('backendtemplate')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
    	    <div class="col-md-12">
                <h1 class="h3 mb-0 text-gray-800">Item List</h1>
                {{--Add New button click yin /under items folder ka create ko go may  --}}
                <a href="{{route('items.create')}}" class="btn btn-success">Add New</a>
            </div>
        </div>
    </div>


<table class="table table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>No.</th>
			<th>Code No</th>
			<th>Name</th>
			<th>Price</th>
			<th>Action</th>
			
		</tr>
	</thead>
	<tbody>

        {{-- table ko looping look chan tar malo <tr> ko @foreach htay htat like tar --}}
        @php $i=1; @endphp
		@foreach($items as $item)
		<tr>
			<td>{{$i++}}</td>
			<td>{{$item->codeno}}</td>
			<td>{{$item->name}}</td>
			<td>{{$item->price}}MMK</td>
			<td>

				{{-- items.edit ka cmd ka Name / $item->id ka bay id ko edit look mar lay --}}
				<a href="{{route('items.edit',$item->id)}}" class="btn btn-secondary">Edit</a>


				<a href="{{route('items.show',$item->id)}}" class="btn btn-primary">Detail</a>

				<form action="{{route('items.destroy',$item->id)}}" method="post" onsubmit="return confirm('Are you Sure Want to Delete!')" class="d-inline-block">
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