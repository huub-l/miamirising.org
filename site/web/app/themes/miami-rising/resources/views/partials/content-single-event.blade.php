<div class="sixteen wide mobile ten wide computer column single-event-content">
  <div class="event">
    @php
      $event = pods('event',get_the_ID());
    @endphp
        <a class="ui violet label">
          Event
          <div class="detail">@php echo $event->display('event_type'); @endphp</div>
        </a>
        @php the_content(); @endphp
        @php echo $event->display( 'an_form.embed_full_layout_only_styles' ); @endphp
  </div>
</div>
