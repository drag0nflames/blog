@extends('main')

@section('title', ' | Blog Posts')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2 index-header">
			<h1 class="text-center font-weight-bold">All  Blog  Posts</h1>
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->
	<div class="row">
		<article class="post-detail">
			<div class="col-md-8 offset-md-2">
				@foreach($posts as $post)
					<div class="post post-item-body padding-10 post-item">
						<div class="col-md-12">
							<h2>{{ $post->title }}</h2>
							<h5>Published: {{ date('M j, Y h:iA', strtotime($post->created_at)) }}</h5>
							<p>{{ substr($post->body, 0, 500 )}}{{ strlen($post->body) >500 ? "..." : "" }}</p>
							<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
						</div><!-- end of col-md-12-->
					</div><!-- end of row-->
				@endforeach
			</div>
		</article>
		<div class="d-flex">
			<div class="mx-auto">
				{{ $posts->links() }}
			</div>
		</div>
	</div>

@endsection