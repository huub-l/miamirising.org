<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include ( 'partials.navbar' )
    @include( 'partials.header' )
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
        @if ( is_front_page ( ) == true )
          @yield ( 'intro' )
          @yield ( 'events' )
          @yield ( 'actions' )
          @yield ( 'posts' )
        @else
          @yield ( 'content' )
        @endif
        </main>
        @if ( App\display_sidebar ( ) )
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
