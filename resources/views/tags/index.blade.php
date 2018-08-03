@extends('main')

@section('title', ' | Tags')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1 class="text-center">Tags</h1>
			<table class="table">
				<thead>
				<tr>
					<th>#</th>
					<th>Name
					<th></th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td>{{ $tag->name}}</td>
						<td></td>
						<td><a href="{{ route('tags.show', [$tag->id]) }}" class="btn btn-outline-info">View</a>
							<a href="{{ route('tags.edit', [$tag->id]) }}" class="btn btn-outline-info">Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table><!-- end of table-->
		</div><!-- end of col-md-8-->
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<form role="form" method="post" action="{{ route('tags.store') }}">
						{{ csrf_field() }}
						<h2 class="text-center">New Category</h2>
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name" placeholder="Enter Tag Name">
						</div>
						<div class="d-flex mx-auto">
							<div class="mx-auto">
								<button type="submit" class="btn btn-primary">Create New Tag</button>
							</div>
						</div>
					</form><!-- end of form-->
				</div><!-- end of card body-->
			</div><!-- end of card-->
		</div><!-- end of col-md-4-->
	</div><!-- end of row -->
@endsection