@extends('main')

@section('title', ' | Forgot my Password')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			@if(session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<div class="card">
				<div class="card-header text-center font-weight-bold">
					Password Reset
				</div><!-- end of card-header-->
				<div class="card-body">
					<div class="col-md-8 offset-md-2">
						<form method="post" action="">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="email">Enter Email:</label>
								<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
							</div>
							<div class="d-flex justify-content-center">
								<button type="submit" class="btn btn-primary">Send reset email link</button>
							</div>
						</form><!-- end of form-->
					</div><!-- end of col-md-6-->
				</div><!-- end of card-body-->
			</div><!-- end of card-->
		</div><!-- end of col-md-8-->
	</div>><!--end of row-->
@endsection