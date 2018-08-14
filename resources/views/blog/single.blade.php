@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', " | $titleTag")

@section('content')
	<div class="row">
		<div class="col-md-8">
			<article class="post-detail post-item">
				<div class="post-item-body padding-10">
					<img src="{{asset('images/'.$post->image)}}" height="400" width="800" class="img-fluid post-image" alt="Responsive image">
					<h1>{{ $post->title }}</h1>
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
							<li><i class="fa fa-comments"></i><a href="#comment_id"> {{ $post->comments->count() }} {{ count($post->comments) >1  ? "comments" : "comment" }}</a></li>
						</ul>
					</div>
					<p clas="lead">{!! $post->body  !!}</p>
					<p> Posted In: {{ $post->category->name }}</p>
				</div>
			</article><!-- end of article-->


			<article class="post-author padding-10">
				<div class="media">
					<div class="media-left">
						<a href="#">
							{{--TODO add image column in user table and access it from here dynamically--}}
							<img alt="Author 1" src="{{ URL::asset('img/author.jpg') }}" class="media-object">
						</a>
					</div>
					<div class="media-body">
						<h2 class="font-weight-bold">Author:</h2>
						<h4 class="media-heading"><a href="#">
							{{$user->name}}
						</a></h4>
						<div class="post-author-count">
							<a href="#">
								<i class="fa fa-clone"></i>
								{{$user->posts->count()}} {{ count($user->posts) >1  ? "posts" : "post" }}
							</a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia
							excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae
							dolorum temporibus consequuntur! Non.</p>
					</div>
				</div><!-- end of media-->
			</article><!-- end of article-->

			<article class="post-comments" id="comment_id">
				<h3><i class="fa fa-comments"></i> {{$post->comments->count()}} Comments</h3>
				<div class="comment-body padding-10">
					<ul class="comments-list">
						@foreach($post->comments as $comment)
							<li class="comment-item">
								<div class="comment-heading clearfix">
									<div class="comment-author-meta">
										<h4>{{$comment->name}}</h4>
										<small>{{ date('M j, Y h:iA', strtotime($comment->created_at))}}</small>
									</div>
								</div>
								<div class="comment-content">
									<p>{{$comment->comment}}</p>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</article>

			<div class="card">
				<h5 class="card-header text-center font-weight-bold">Comment Form</h5>
				<div class="card-body">
					<form method="post" action="{{ route('comments.store', [$post->id]) }}">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name:</label>
									<input type="text" class="form-control" name="name">
								</div>
							</div><!-- end of col-md-6-->
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Email:</label>
									<input type="email" class="form-control" name="email">
								</div>
							</div><!-- end of col-md-6-->
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Comment:</label>
									<textarea type="comment" class="form-control" rows="10" name="comment"></textarea>
								</div>
							</div><!-- end of col-md-6-->
						</div><!-- end of row-->
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-success btn-block ">Submit</button>
						</div>
					</form><!-- end of form-->
				</div>
			</div>
		</div><!--end of col-md-8-->

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
	</div><!-- end of row-->
@endsection