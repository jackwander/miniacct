
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<!-- Header -->
@include('include.header')
<!-- /.Header -->
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  @include('include.top-navbar')
  <!-- /.navbar -->

  <!-- Sidebar -->
  @include('include.sidebar')
  <!-- /.sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  @include('include.footer')
</div>
<!-- ./wrapper -->

<!-- Scripts -->
@include('include.scripts')
<!-- /.Scripts -->
</body>
</html>
