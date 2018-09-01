<div class="sixteen wide mobile ten wide computer column single-event-content">
  <div class="event">
    @php
      $eventpod = pods('event');
      $params = array(
        'limit' => 1,
        'id' => get_the_id(),
      );
      $eventpod->find($params);
      while( $eventpod->fetch() ) : @endphp
        <a class="ui violet label">
          Event
          <div class="detail">@php echo $eventpod->display('event_type'); @endphp</div>
        </a>
        @php echo $eventpod->display( 'event_table.embed_full_layout_only_styles' ); @endphp
        @include('partials.events.events-sponsors')
      @php endwhile; @endphp
  </div>
</div>
