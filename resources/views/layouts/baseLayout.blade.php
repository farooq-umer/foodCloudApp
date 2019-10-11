<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')

  <title>
    @hasSection('title')
      @yield('title') -
    @endif
      {{ config('app.name') }}
  </title>
</head>

<body>
  <div class="wrapper ">

    @include('includes.sidebar')

    <div class="main-panel">
      <header>
        @include('includes.header')
      </header>

      <div class="content">

        <div class="container">
          @include('includes.flash-message')
        </div>

        <div class="container-fluid">
          <main>
            {{-- if content section is undefined, then contentSectionNotFound view will be rendered --}}
            @yield('content', View::make('pages.contentSectionNotFound'))
          </main>
        </div>
      </div>

      <footer class="footer">
        @include('includes.footer')
      </footer>

    </div>
  </div>

  @include('includes.scripts')

{{-- @hasSection checks if a section has content --}}
  @hasSection('page-script')
    @yield('page-script')
  @endif

</body>

</html>
