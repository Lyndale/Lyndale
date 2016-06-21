<!DOCTYPE html>
<html lang="en-US">
  @include('includes.frontend/home_head')
    <body class="page-homepage navigation-fixed-top page-slider horizontal-search" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
    <!-- Wrapper -->
     <div class="wrapper">
      @include('includes.frontend/common_navigation')
      @include('includes.frontend/home_slider')
      @include('includes.frontend/home_search')
      @yield('pagecontent')
      @include('includes.frontend/common_footer')
     </div>
     <div id="overlay"></div>
      @include('includes.frontend/home_script')   
    </body>
</html>



