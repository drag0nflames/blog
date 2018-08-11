@extends('main')

@section('title', ' | Edit Comment')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<h5 class="card-header text-center font-weight-bold">Edit Form</h5>
				<div class="card-body">
					<form method="post" action="{{route('comments.update', [$comment->id])}}">
						{{csrf_field()}}
						{{ method_field("PUT") }}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name:</label>
									<input type="text" class="form-control" name="name" value="{{$comment->name}}">
								</div>
							</div><!-- end of col-md-6-->
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Email:</label>
									<input type="email" class="form-control" name="email" value="{{$comment->email}}">
								</div>
							</div><!-- end of col-md-6-->
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Comment:</label>
									<textarea type="comment" class="form-control" rows="10"
											  name="comment">{{$comment->comment}}</textarea>
								</div>
							</div><!-- end of col-md-6-->
						</div><!-- end of row-->
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-success">Save Changes</button>
						</div>
					</form><!-- end of form-->
				</div>
			</div>
		</div>
	</div>
@endsection