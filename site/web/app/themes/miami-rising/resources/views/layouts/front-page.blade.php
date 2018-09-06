<!doctype html>
<html {{ get_language_attributes() }}>
  @include('partials.head')
  <body @php body_class() @endphp>

    @php do_action('get_header') @endphp
    @include('partials.nav.nav-front')
    @include('partials.title.miami-rise-event-svg')

    <div class="dimmed pusher" role="document">
      <div class="content">
        <main class="main">

          @include('partials.front-page.featured-event',
                  ['teaser' => $featured_event['teaser'],
                   'form' => $featured_event['form'],
                   'type' => $featured_event['type']])

          @include('partials.front-page.groups',
                  ['groups' => $groups])

          @include('partials.front-page.actions',
                  ['actions' => $actions])

        </main>
        @php do_action('get_footer') @endphp
        @include('partials.footer')
        @php wp_footer() @endphp
      </div>
    </div>
  </body>
</html>
