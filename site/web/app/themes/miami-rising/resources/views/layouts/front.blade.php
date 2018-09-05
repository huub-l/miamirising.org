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

          @include('partials.front-page.synopsis')

          @php
          $action = pods('action');
          $params = array(
            'limit' => 1
          );
          $action->find($params);
          if($action) : @endphp

           @include('partials.front-page.actions')

          @php endif; @endphp

          @php
          $group = pods('group');
          $params = array(
            'limit' => 1
          );
          $group->find($params);
          if($group) : @endphp

            @include('partials.front-page.groups')

          @php endif; @endphp

        </main>
        @php do_action('get_footer') @endphp
        @include('partials.footer')
        @php wp_footer() @endphp
      </div>
    </div>
  </body>
</html>
