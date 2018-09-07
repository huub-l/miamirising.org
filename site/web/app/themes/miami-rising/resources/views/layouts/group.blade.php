<!doctype html>
<html {{ get_language_attributes() }}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.nav.nav')
    <div class="dimmed pusher" role="document">
      <div class="content">
        @php $background = get_template_directory_uri() .'/assets/images/pollution-truck-colorized.jpg'; @endphp
        @include('partials.title.general-title',
                ['title' => 'The Miami Rising Coalition',
                 'background_image' => $background,
                 'background_color' => 'rgb(82, 93, 220)'])
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
