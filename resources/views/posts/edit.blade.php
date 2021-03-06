@extends('main')

@section('stylesheets')
	<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/select2.css') }}">
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script>
        tinymce.init({
            selector:'textarea',
            plugins: "link code",
        });
	</script>
@endsection

@section('title','| Edit post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<form method="POST" action={{ route('posts.update', [$post->id]) }} data-parsley-validate enctype="multipart/form-data" files="true">
				{{ csrf_field() }}
				{{ method_field("PUT") }}
				<div class="form-group">
					<label for="title" class="font-weight-bold">Title:</label>
					<input id="title" name="title" class="form-control" value="{{ $post->title }}" required>
				</div><!-- end of form-group-->

				<div class="form-group">
					<label for="slug" class="font-weight-bold">Slug:</label>
					<input id="slug" name="slug" class="form-control" value="{{ $post->slug }}" required>
					<small id="slugHelp" class="form-text text-muted">Slug is user-friendly URL which other users will
						see when they view ur posts
					</small>
				</div><!-- end of form-group-->

				<div class="form-group">
					<label for="category" class="font-weight-bold">Category: </label>
					<select class="form-control" id="category_id" name="category_id" required>
						@foreach($categories as $category)
							@if($category->id == $post->category_id)
								<option value="{{ $category->id}}" selected>{{ $category->name }}</option>';
							@else
								<option value="{{ $category->id}}">{{ $category->name }}</option>
							@endif
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
					<label for="featured_image" class="font-weight-bold">Update Featured Image: </label>
					<div class="input-group">
            			<span class="input-group-btn">
               				 <span class="btn btn-primary btn-file">
                   		 		Browse… <input type="file" name="featured_image" id="featured_image" >
                			</span>
						</span>
						<input type="text" class="form-control" readonly>
					</div>
					<img id='img-upload'/>
				</div>

				<div class="form-group">
					<label for="body" class="font-weight-bold">Body:</label>
					<textarea rows="6" id="body" name="body" class="form-control" required>{{$post->body}}</textarea>
				</div><!-- end of form-group-->

				<input type="submit" value="Save Changes" class="btn btn-success text-center">
			</form><!-- end of form-->


		</div><!-- end of col-md-8-->
		<div class="col-md-4">
			<div class="card card-body bg-light">
				<dl class="row">
					<dt class="container dt">Created At:</dt>
					<dd class="container dd">{{ date('M j, Y h:iA', strtotime($post->created_at))}}</dd>
				</dl>
				<dl class="row">
					<dt class="container dt">Updated At:</dt>
					<dd class="container dd">{{ date('M j, Y h:iA', strtotime($post->updated_at))}}</dd>
				</dl>
				<hr>
				<div class="row text-center">
					<div class="col-sm-12">
						<a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-danger mx-auto">Cancel</a>
					</div>
				</div><!-- end of row-->
			</div><!-- end of card-->
		</div><!-- end of col-md-4-->
	</div><!-- end of row-->
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/select2.full.js') }}"></script>
	<script type="text/javascript">
        $('.select2-selection--multiple').select2();
        $('.select2-selection--multiple').select2().val({{ json_encode($post->tags()->allRelatedIds()) }}).trigger('change');
	</script>
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
@endsection