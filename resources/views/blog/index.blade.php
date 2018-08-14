@extends('main')

@section('title', ' | Blog Posts')

@section('content')
	<div class="row">
		<div class="col-md-8 index-header">
			<h1 class="text-center font-weight-bold">All Blog Posts</h1>
		</div><!-- end of col-md-12-->
	</div>
	<div class="row">
		<div class="col-md-8">
			<article class="post-detail">
				@foreach($posts as $post)
					<div class="post post-item-body padding-10 post-item">
						<div class="col-md-12">
							<img src="{{asset('images/'.$post->image)}}" height="400" width="800"
								 class="img-fluid post-image center-block" alt="Responsive image">
							<h2>{{ $post->title }}</h2>
							<div class="post-meta no-border">
								<ul class="post-meta-group">
									<li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
									<li><i class="fa fa-clock"></i>
										<time>{{ date('M j, Y h:iA', strtotime($post->created_at))}}</time>
									</li>
									<li><i class="fa fa-tags"></i>
										@foreach($post->tags as $tag)
											<span class="badge badge-secondary">{{ $tag->name }}</span>
										@endforeach
									</li>
									<li>
										<i class="fa fa-comments"></i>{{ $post->comments->count() }} {{ count($post->comments) >1  ? "comments" : "comment" }}
									</li>
								</ul>
							</div>
							<p>{!! substr($post->body, 0, 500 )!!}{{ strlen($post->body) >500 ? "..." : "" }}</p>
							<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
						</div><!-- end of col-md-12-->
					</div><!-- end of row-->
				@endforeach
				<div class="d-flex">
					<div class="mx-auto">
						{{ $posts->links() }}
					</div>
				</div>
			</article>
		</div>

		<div class="col-md-4">
			<aside class="right-sidebar">
				<div class="search-widget">
					<div class="input-group">
						<input type="text" class="form-control input-lg" placeholder="Search for...">
						<span class="input-group-btn">
                            <button class="btn btn-lg btn-default" type="button" style="margin-left: 10px">
                                <i class="fa fa-search"></i>
                            </button>
                          </span>
					</div><!-- /input-group -->
				</div><!-- end of search widget-->

				<div class="card search-widget">
					<div class="card-header text-center font-weight-bold">
						Categories
					</div>
					<ul class="list-group list-group-flush">
						@foreach($categories as $category)
							<li class="list-group-item"><i class="fa fa-angle-right"></i> {{$category->name}}<span
										class="badge-secondary badge-pill float-right">{{$category->posts->count()}}</span>
							</li>
						@endforeach
					</ul>
				</div><!-- end of card-->

				<div class="card">
					<div class="card-header text-center font-weight-bold">
						Tags
					</div>
					<div class="card-body">
						@foreach($tags as $tag)
							<button type="button" class="btn btn-light" style="margin: 10px">
								{{$tag->name}}
							</button>
						@endforeach
					</div>
				</div>
			</aside><!-- end of aside-->
		</div><!-- end of col-md-4-->
	</div>
@endsection