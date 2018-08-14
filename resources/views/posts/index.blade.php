@extends('main')

@section('title', '| All Posts')

@section('content')
	<div class="row index-style">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div><!-- end of col-md-10-->
		<div class="col-md-2 button-style">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-block">Create New Post</a>
		</div><!-- end of col-md-2-->
	</div><!-- end of row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
				</thead>
				<tbody>
				@foreach($posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>{!! substr($post->body,0,50) !!}{!! @strlen($post->body) > 50 ? "..." : "" !!}</td>
						<td>{{ date('M j, Y h:iA', strtotime($post->updated_at)) }}</td>
						<td><a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-light">View</a> <a
									href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-light">Edit</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->
	<div class="d-flex">
		<div class="mx-auto">
			{{ $posts->links() }}
		</div>
	</div>

@endsection