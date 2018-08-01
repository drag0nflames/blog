@extends('main')

@section('title', ' | Blog Posts')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-center">Blog</h1>
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->
	<hr>
	@foreach($posts as $post)
		<div class="row post">
			<div class="col-md-8 offset-md-2">
				<h2>{{ $post->title }}</h2>
				<h5>Published: {{ date('M j, Y h:iA', strtotime($post->created_at)) }}</h5>
				<p class="lead">{{ $post->body }}</p>
				<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
			</div><!-- end of col-md-12-->
		</div><!-- end of row-->
	@endforeach
	<div class="d-flex">
		<div class="mx-auto">
			{{ $posts->links() }}
		</div>
	</div>
@endsection