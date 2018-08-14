@extends('main')

@section('title','| Homepage')

@section('content')
	<div class="row">
		@if(session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
		<div class="col-md-12">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100"
							 src="{{ URL::asset('img/Carousel_Large_1.jpg') }}?auto=yes&bg=777&fg=555&text=First slide"
							 alt="First slide">
						<div class="carousel-caption d-none d-md-block">
							<h5>Twitter Bootstrap 4</h5>
							<p>Create your own website using twitter bootstrap 4</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100"
							 src="{{ URL::asset('img/Carousel_Large_2.jpg') }}?auto=yes&bg=666&fg=444&text=Second slide"
							 alt="Second slide">
						<div class="carousel-caption d-none d-md-block">
							<h5>Javascript</h5>
							<p>Add effects to your website with Javascript</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100"
							 src="{{ URL::asset('img/Carousel_Large_3.jpg') }}?auto=yes&bg=555&fg=333&text=Third slide"
							 alt="Third slide">
						<div class="carousel-caption d-none d-md-block">
							<h1>Laravel</h1>
							<p>Laravel is a free, open-source PHP web framework intended for the development of web
								applications following MVC architectural pattern and based on Symfony.</p>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->

	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class="display-4">Welcome to my blog</h1>
				<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
					attention to featured content or information.</p>
				<hr class="my-4">
				<p>It uses utility classes for typography and spacing to space content out within the larger
					container.</p>
				<a class="btn btn-primary btn-lg" href="{{url('about')}}" role="button">Learn more</a>
			</div><!-- end of jumbotron-->
		</div><!-- end of col-md-12-->
	</div><!-- end of row-->

	<div class="row">
		<div class="col-md-8">
			<article class="popular-posts post-detail post-item">
				<h1>Popular Posts</h1>
				<div>
					<?php $count = 0; ?>
					@foreach($posts as $post)
						<?php if ($count == 3) break; ?>
						<div class="post post-item-body padding-10">
							<img src="{{asset('images/'.$post->image)}}" height="400" width="800"
								 class="img-fluid post-image" alt="Responsive image">
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
							<p>{!! substr($post->body, 0, 300 )!!}{{ @strlen($post->body) >300 ? "..." : "" }}</p>
							<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
							<?php $count++; ?>
						</div>
					@endforeach
				</div>
			</article>
		</div><!-- end of col-md-8-->

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