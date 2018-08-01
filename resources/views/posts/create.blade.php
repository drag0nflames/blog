@extends('main')

@section('stylesheets')
	<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
@endsection

@section('title', '| Create New Post')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Create New Post</h1>
			<hr>
			<form method="POST" action={{ route('posts.store') }} data-parsley-validate>
				<div class="form-group">
					<label for="title" class="font-weight-bold">Title: </label>
					<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
						   maxlength="255" required placeholder=" Enter The Title">
				</div><!--end of form-group-->

				<div class="form-group">
					<label for="slug" class="font-weight-bold">Slug: </label>
					<input type="text" id="slug" name="slug" class="form-control" minlength="5"
						   value="{{ old('slug') }}"
						   maxlength="255" required placeholder=" Enter The Slug">
					<small id="slugHelp" class="form-text text-muted">Slug is user-friendly URL which other users will
						see when they view ur posts
					</small>
				</div><!--end of form-group-->

				<div class="form-group">
					<label for="category" class="font-weight-bold">Category: </label>
					<select class="form-control" id="category_id" name="category_id">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div><!--end of form-group-->

				<div class="form-group">
					<label for="body" class="font-weight-bold">Body: </label>
					<textarea rows="6" id="body" name="body" class="form-control" required
							  placeholder=" Enter The Body Of Blog">{{ old('body') }}</textarea>
				</div><!--end of form-group-->


				<input type="submit" class="btn btn-success btn-lg btn-block" value="Create Post">
				{{ csrf_field() }}
			</form><!-- end of form--->
		</div><!-- end of grid offsetr-->
	</div><!-- end of row-->
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
@endsection