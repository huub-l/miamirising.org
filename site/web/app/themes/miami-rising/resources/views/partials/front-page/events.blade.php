<div class="block">
  <div class="page ui container">
    <div class="ui two column grid">
      <div class="row">
        <div class="sixteen wide mobile eight wide computer column">
          <h1>Area Events</h1>
        </div>
        <div class="sixteen wide mobile eight wide computer column">
          @php foreach  ( $events as $event ) : setup_postdata( $event ); @endphp
            @include ( 'partials.content-event', array (
              'event' => $event
            ) )
          @php endforeach; wp_reset_postdata(); @endphp
        </div>
      </div>
    </div>
  </div>
</div>
