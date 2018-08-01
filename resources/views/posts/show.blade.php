@extends('main')

@section('title','| View post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{{ $post->body }}</p>
			<hr>
			<div>
				@foreach($post->tags as $tag)
					<span class="badge badge-info">{{ $tag->name }}</span>
				@endforeach
			</div>
		</div><!-- end of col-md-8-->
		<div class="col-md-4">
			<div class="card card-body bg-light">
				<dl class="row">
					<dt class="col-4">URL:</dt>
					<dd class="col-8"><a
								href="{{ route('blog.single',$post->slug)}}">{{ route('blog.single',$post->slug) }}</a>
					</dd>
				</dl>
				<dl class="row">
					<dt class="col-4">Category:</dt>
					<dd class="col-8"><p>{{ $post->category->name }}</p></dd>
				</dl>
				<dl class="row">
					<dt class="col-4">Created At:</dt>
					<dd class="col-8">{{ date('M j, Y h:iA', strtotime($post->created_at))}}</dd>
				</dl>
				<dl class="row">
					<dt class="col-4">Updated At:</dt>
					<dd class="col-8">{{ date('M j, Y h:iA', strtotime($post->updated_at))}}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-primary btn-block">Edit</a>
					</div>
					<div class="col-sm-6">
						<form method="post" action="{{route('posts.destroy', [$post->id])}}">
							{{ csrf_field() }}
							{{ method_field("DELETE") }}
							<input class="btn btn-danger btn-block" type="submit" value="Delete">
						</form><!-- end of form-->
					</div><!-- ed of col-sm-6-->
				</div><!-- end of row-->
				<hr>
				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						<form method="get" action="{{ route('posts.index') }}">
							{{ csrf_field() }}
							<button type="submit" class=" btn btn-outline-info">See All Posts</button>
						</form>
					</div>
				</div><!-- end of row-->
			</div><!-- end of card-->
		</div><!-- end of col-md-4-->
	</div><!-- end of row-->
@endsection
