<!-- Default bootstrap navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top header-style">
	<a class="navbar-brand {{ Request::is('/') ? "active" : "" }}" href="/">Laravel Blog</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ Request::is('/') ? "active" : "" }}">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
				<a class="nav-link" href="blog">Blog <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item {{ Request::is('about') ? "active" : "" }}">
				<a class="nav-link" href="about">About</a>
			</li>
			<li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
				<a class="nav-link" href="contact">Contact</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>
		</ul>
		<div class="btn-group">
			<ul class="navbar-nav mr-auto">
				@if(Auth::check())
					<a href="#" class="btn btn-group btn-outline-primary btn-sm mr-2" role="button"
													aria-disabled="true">Primary link</a>
					<a href="#" class="btn btn-group btn-outline-secondary btn-sm mr-2"
													role="button" aria-disabled="true">Link</a>
					<li>
						<div class="dropdown show">
							<a class="btn btn-outline-primary mr-2 btn-sm btn-group dropdown-toggle" href="#" role="button"
							   id="dropdownMenuLink"
							   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-disabled="true">
								Hello {{ Auth::user()->name }}
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
								<a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
							</div>
						</div><!--end of dropdown menu -->
					</li>
				@else
					<a href="{{ route('register') }}" class="btn btn-outline-info mr-2">Register</a>
					<a href="{{ route('login') }}" class="btn btn-outline-info">Login</a>
				@endif
			</ul>
		</div>
	</div><!-- end of container-->
</nav><!-- navbar collapse-->
<!-- end of Default Bootsrap navbar-->