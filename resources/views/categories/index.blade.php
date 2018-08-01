@extends('main')

@section('title', ' | All Categories')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1 class="text-center">Categories</h1>
			<table class="table">
				<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name}}</td>
					</tr>
				@endforeach
				</tbody>
			</table><!-- end of table-->
		</div><!-- end of col-md-8-->
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<form role="form" method="post" action="{{ route('categories.store') }}">
						{{ csrf_field() }}
						<h2 class="text-center">New Category</h2>
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name" placeholder="Enter Category Name">
						</div>
						<div class="d-flex mx-auto">
							<div class="mx-auto">
								<button type="submit" class="btn btn-primary">Create New Category</button>
							</div>
						</div>
					</form><!-- end of form-->
				</div><!-- end of card body-->
			</div><!-- end of card-->
		</div><!-- end of col-md-4-->
	</div><!-- end of row -->
@endsection