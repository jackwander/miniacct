<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Header -->
@include('include.header')
<!-- /.Header -->
<body>
    <div id="app">
        <!-- Navbar -->
      @if(Auth::guard('web')->check())
        @include('include.navbar')
      @else
        @include('include.navbar')
      @endif
        <!-- /.navbar -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
