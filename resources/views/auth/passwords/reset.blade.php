@extends('main')

@section('title', ' | Reset Password')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header text-center font-weight-bold">
					Password Reset
				</div><!-- end of card-header-->
				<div class="card-body">
					<div class="col-md-8 offset-md-2">
						<form method="post" action=" {{ route('password.reset') }}">
							@csrf
							{{ csrf_field() }}
							<div class="form-group">
								<label for="email">Email Address:</label>
								<input type="email" class="form-control" name="email"
									   value={{$email}}>
							</div>
							<div class="form-group">
								<label for="password">New Password:</label>
								<input type="password" class="form-control" name="password"
									   placeholder="Enter New Password">
							</div>
							<div class="form-group">
								<label for="confirm">Confirm Password:</label>
								<input type="password" class="form-control" name="password_confirmation"
									   placeholder="Re-enter New Password">
							</div>
							<input type="hidden" name="token" value="{{$token}}">
							<div class="d-flex justify-content-center">
								<button type="submit" class="btn btn-primary ">Reset Password</button>
							</div>
						</form><!-- end of form-->
					</div><!-- end of col-md-6-->
				</div><!-- end of card-body-->
			</div><!-- end of card-->
		</div><!-- end of col-md-8-->
	</div>><!--end of row-->
@endsection