<!DOCTYPE html>
<html>
<head>
 @include('theme.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
@include('theme.header')
  @include('theme.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('main-content') 
  </div>

  @include('theme.footer')
@include('theme..extra')
<!-- ./wrapper -->
@include('theme.foot')
</body>
</html>
