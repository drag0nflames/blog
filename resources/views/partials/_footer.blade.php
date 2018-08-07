<footer>
	<div id="footer" class="footer-style panel-footer">
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-sm-2">
					<h6 class="font-weight-bold">Copyright &copy; <?php echo "2013-" . date('Y');?></h6>
				</div><!-- ./end col-sm-2-->

				<div class="col-sm-4">
					<h6 class="font-weight-bold">About us </h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui dicta minus molestiae vel beatae natus
						eveniet ratione temporibus aperiam harum alias officiis assumenda officia quibusdam deleniti eos
						cupiditate dolore doloribus!</p>
				</div><!-- ./end col-sm-4-->

					<div class="col-sm-2">
					<h6 class="font-weight-bold">Navigation</h6>
					<ul class="list-unstyled">
						<li><a href="/">Home</a></li>
						<li><a href="{{url('blog')}}">Blog</a></li>
						<li><a href="{{url('contact')}}">Contact Us</a></li>
						<li><a href="{{url('about')}}">About</a></li>
					</ul>
				</div><!-- ./end col-sm-2-->

				<div class="col-sm-2">
					<h6 class="font-weight-bold">Follow Us:</h6>
					<ul class="list-unstyled">
						<li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
						<li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
						<li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
						<li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i> Google+</a></li>
					</ul>
				</div><!-- ./end col-sm-2-->

				<div class="col-sm-2">
					<h6 class="font-weight-bold">Coded with <i class="fa fa-heart" aria-hidden="true"></i> by Bikey Bhujel</h6>
				</div><!-- ./end col-sm-2-->
			</div><!-- ./end row-->
		</div><!-- ./end container-->
	</div><!-- ./ end of footer-->


	@section('scripts')
		<script>
            $(document).ready(function() {
                var docHeight = $(window).height();
                var footerHeight = $('#footer').height();
                var footerTop = $('#footer').position().top + footerHeight;
                if (footerTop < docHeight) {
                    $('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
                }
            });
		</script><!-- end of script-->
		<!-- Note
			We need at least an element with a #footer
			When not want the scrollbar if content would fit to screen just change the value of 10 to 0
			The scrollbar will show up if content not fits to screen.-->
	@endsection
</footer><!-- end of footer-->

												