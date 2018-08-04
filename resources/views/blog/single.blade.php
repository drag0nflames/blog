@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', " | $titleTag")

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

	<div class="row comment-section">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<h5 class="card-header text-center">Comment Form</h5>
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
		</div><!-- end of col-md-8-->
	</div><!-- end of row-->
@endsection