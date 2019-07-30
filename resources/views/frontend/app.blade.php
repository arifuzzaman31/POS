@include('frontend._partial.top')
	
<!-- Header section -->
	
	@include('frontend._partial.header')
<!-- Header section end -->


		@yield('content')
	

<!-- Footer section -->
	@include('frontend._partial.footer')
	
<!-- Footer section end -->

	<!--====== Javascripts & Jquery ======-->
@include('frontend._partial.bottom')

