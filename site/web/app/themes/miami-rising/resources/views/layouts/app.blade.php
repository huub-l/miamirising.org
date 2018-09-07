<!doctype html>
<html {{ get_language_attributes() }}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.nav.nav')
    @include('partials.elementor.global.nav-post')
    <div class="dimmed pusher" role="document">
      <div class="content">
        @include('partials.title.title-page')
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
