@extends('main')

@section('stylesheets')
	<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/select2.css') }}">
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
        tinymce.init({
            selector: 'textarea',
            plugins: "link code",
        });
	</script>
@endsection

@section('title', '| Create New Post')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1 class="text-center">Create New Post</h1>
			<hr>
			<form method="POST" action={{ route('posts.store') }} data-parsley-validate enctype="multipart/form-data">
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
					<select class="form-control" id="category_id" name="category_id" required>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div><!--end of form-group-->

				<div class="form-group">
					<label for="tags" class="font-weight-bold">Tags: </label>
					<select class="form-control select2-selection--multiple" name="tags[]" multiple="multiple" required>
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->name }}</option>
						@endforeach
					</select>
				</div><!--end of form-group-->

				<div class="form-group">
					<label for="featured_image" class="font-weight-bold">Featured Image: </label>
					<div class="input-group">
            			<span class="input-group-btn">
               				 <span class="btn btn-primary btn-file">
                   		 		Browse… <input type="file" name="featured_image" id="featured_image">
                			</span>
						</span>
						<input type="text" class="form-control" readonly>
					</div>
					<img id='img-upload'/>
				</div>

				<div class="form-group">
					<label for="body" class="font-weight-bold">Body: </label>
					<textarea rows="9" id="body" name="body" class="form-control" required
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
	<script type="text/javascript" src="{{ URL::asset('js/select2.full.js') }}"></script>
	<script type="text/javascript">
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#featured_image").change(function(){
                readURL(this);
            });
        });
	</script>
	<script type="text/javascript">
        $('.select2-selection--multiple').select2();
	</script>
@endsection