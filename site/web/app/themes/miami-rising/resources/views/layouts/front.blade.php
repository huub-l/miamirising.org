<!doctype html>
<html {{ get_language_attributes() }}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @include('partials.nav')
    <div role="document">
      <div class="content">
        <main class="main">
          @include('partials.miami-rise-event-svg')
          @include('partials.front-page.synopsis')
        </main>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
