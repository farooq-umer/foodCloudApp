<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')
  <title>@if(View::hasSection('title'))@yield('title') - @endif{{ config('app.name', 'Food Cloud') }}</title>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="javascript:void(0);" class="simple-text logo-normal">
          Food Cloud
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{ route('show_forms') }}">
              <i class="material-icons">dashboard</i>
              <p>Forms</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">

      <header>
        @include('includes.header')
      </header>

      <div class="content">
        <div class="container-fluid">

          <main class="py-4">
            @yield('content')
          </main>

        </div>
      </div>

      <footer class="footer">
        @include('includes.footer')
      </footer>

    </div>
  </div>

  @include('includes.scripts')

</body>

</html>
