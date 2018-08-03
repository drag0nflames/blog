@extends('main')

@section('title', " | $tag->name Tag")

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name }} Tag
				<small>{{ $tag->posts()->count() }} Posts</small>
			</h1>
		</div>
		<div class="col-md-4">
			<a href="{{ route('tags.edit', [$tag->id]) }}" class="btn btn-outline-info float-right">Edit</a>
			<form method="POST" action="{{ route('tags.destroy', [$tag->id]) }}">
				{{csrf_field()}}
				{{ method_field("DELETE") }}
				<button type="submit" class="btn btn-outline-danger float-right mx-2">Delete</button>
			</form><!-- end of form-->
		</div><!-- end of col-md-4-->
	</div><!-- end of row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Title</th>
					<th scope="col">Tags</th>
					<th scope="col"></th>
				</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>
								@foreach($post->tags as $tag)
									<span class="badge badge-info">{{ $tag->name }}</span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-light">View</a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->


@endsection