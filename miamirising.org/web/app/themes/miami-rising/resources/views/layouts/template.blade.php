<!doctype html>
<html {{ get_language_attributes() }}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    <section>
      @yield('content')
    </section>
    @php do_action('get_footer') @endphp
    @php wp_footer() @endphp
  </body>
</html>
