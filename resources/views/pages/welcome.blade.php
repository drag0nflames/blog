@extends('main')

@section('title','| Homepage')

@section('content')
	<div class="row">
		<div class="col-md-12">
			@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<div class="jumbotron">
				<h1 class="display-4">Welcome to my blog</h1>
				<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
					attention to featured content or information.</p>
				<hr class="my-4">
				<p>It uses utility classes for typography and spacing to space content out within the larger
					container.</p>
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</div><!-- end of jumbotron-->
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->

	<div class="row">
		<div class="col-md-8">
			@foreach($posts as $post)
				<div class="post">
					<h3>{{ $post->title }}</h3>
					<p class="lead">{{ substr($post->body, 0, 300 )}}{{ strlen($post->body) >300 ? "..." : "" }}</p>
					<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
				</div>
			@endforeach
		</div><!-- end of col-md-8-->

		<div class="col-md-4 md-offset-1">
			<h3 class="text-center">Sidebar</h3>
		</div>
	</div><!-- end of row-->
@endsection