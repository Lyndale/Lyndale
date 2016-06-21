<!DOCTYPE html>
<html>
<?php $admin=get_current_adminData();?>
@include('includes.commonhead')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('includes.account_header')
@include('includes.sidebar')
@yield('content')
@include('includes.footer') 
</div>
@include('includes.commonfoot')
</body>
</html>
