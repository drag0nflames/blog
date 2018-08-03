@extends('main')

@section('title','| Contact page')

@section('content')
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<h1 class="text-center">Contact Me</h1>
			<hr>
			<form method="post" action="{{  url('contact') }}">
				{{csrf_field()}}
				<div class="form-group">
					<label for="email" class="font-weight-bold">Email: </label>
					<input id="email" name="email" class="form-control" placeholder="Type ur email here">
				</div><!-- end of form group-->

				<div class="form-group">
					<label for="email" class="font-weight-bold">Subject: </label>
					<input id="subject" name="subject" class="form-control" placeholder="Type your subject here">
				</div><!-- end of form group-->

				<div class="form-group">
					<label for="message" class="font-weight-bold">Message: </label>
					<textarea id="message" name="message" class="form-control" placeholder="Type your message here"></textarea>
				</div><!-- end of form group-->

				<input type="submit" value="send message" class="btn btn-success text-center">
			</form><!-- end of form-->
		</div><!--end of col-md-12-->
	</div><!--end of row-->
@endsection