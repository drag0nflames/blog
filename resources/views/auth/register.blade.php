@extends('main')

@section('title', ' | Registration Form')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header text-center font-weight-bold">Registration</div>
				<div class="card-body col-md-8 offset-md-2">
					<form  role="form" method="post" action="">
						{{csrf_field()}}
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name"
								   placeholder="Enter your name">
						</div>
						<div class="form-group">
							<label for="email">Email Address:</label>
							<input type="email" class="form-control" name="email"
								   aria-describedby="emailHelp" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="password"
								   placeholder="Password">
						</div>
						<div class="form-group">
							<label for="confirm">Confirm Password:</label>
							<input type="password" class="form-control" name="password_confirmation"
								   placeholder="Password">
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-primary ">Register</button>
						</div>
					</form>
				</div>
			</div><!-- end of card-->
		</div><!-- end of col-md-12 -->
	</div><!-- end of row-->
@endsection
