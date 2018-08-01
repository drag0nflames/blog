@extends('main')

@section('title', '| Login Page')

@section('content')
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header text-center font-weight-bold">Login Page</div>
				<div class="card-body col-md-8 offset-md-2">
					<form role="form" method="post" action="">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="email">Email Address:</label>
							<input type="email" class="form-control" name="email"
								   aria-describedby="emailHelp" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
								else.
							</small>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="password"
								   placeholder="Password">
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="remember">
							<label class="form-check-label" for="exampleCheck1">Remember Me</label>
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-primary ">Login</button>
						</div>
						<a class="btn btn-link" href="{{ route('password.email') }}">Forgot Your Password?</a>
					</form>
				</div>
			</div><!-- end of card-->
		</div><!-- end of col-md-12 -->
	</div><!-- end of row-->
@endsection

