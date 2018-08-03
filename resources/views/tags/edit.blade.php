@extends('main')

@section('title', ' | Edit Tag')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header text-center font-weight-bold">
					Edit Tag
				</div>
				<div class="card-body">
					<form method="POST" action="{{route('tags.update', [$tag->id])}}">
						{{csrf_field()}}
						{{ method_field("PUT") }}
						<div class="form-group">
							<label for="title" class="font-weight-bold">Title:</label>
							<input type="text" class="form-control" name="name" value="{{ $tag->name }}">
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-success ">Save Changes</button>
						</div>
					</form><!-- end of form-->
				</div><!-- end of card-body-->
			</div><!-- end of card-->
		</div><!-- end of col-md-6-->
	</div><!--end of row-->
@endsection