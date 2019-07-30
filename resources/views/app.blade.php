@include('_partials.top')
	@include('_partials.header')
		@include('_partials.leftNavbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @yield('content')
    <!-- /.content -->
  </div>
  
  @include('_partials.footer')
<!-- Bootstrap 3.3.7 -->
      @yield('script')
  @include('_partials.bottom')



