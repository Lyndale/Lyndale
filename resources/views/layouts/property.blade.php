<!DOCTYPE html>

<html lang="en-US">
  @include('includes.frontend/property_head')
<body class="page-sub-page navigation-fixed-top page-listing-masonry page-search-results inner-pages" id="page-top">
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
     @include('includes.frontend/property_script') 

</body>
</html>
