@extends('main')

@section('title', " | $post->title")

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-center">{{ $post->title }}</h1>
			<hr>
			<p clas="lead">{{ $post->body }}</p>
			<hr>
			<p> Posted In: {{ $post->category->name }}</p>
		</div><!--end of col-md-8-->
	</div><!-- end of row-->
@endsection