<!DOCTYPE html>

<html lang="en-US">
  @include('includes.frontend/common_head')
<body class="page-sub-page page-profile page-account navigation-fixed-top inner-pages" id="page-top">
<!-- Wrapper -->
<div class="wrapper">
    <!-- Navigation -->
         @include('includes.frontend/common_navigation')
    <!-- end Navigation -->
    
    
    <!-- Page Content -->
          @yield('pagecontent')
    <!-- end Page Content -->
    
    
    <!-- Page Footer -->
      @include('includes.frontend/common_footer')
    <!-- end Page Footer -->
</div>

      @include('includes.frontend/common_script') 

</body>
</html>
