@php
  $events = pods(null,array('limit' => -1));
  $events->fetch(get_the_ID());
  $event = (object) array(
    'type'        => $events->field( 'event_type' ),
    'date'        => date( "F j, Y, g:i a", $events->field( 'an_form.start_date' ) ),
    'details'     => $events->field( 'an_form.description' ),
  );
@endphp

<div class="ui item middle aligned">
    <a class="ui middle aligned medium image" href="@php echo get_the_permalink(); @endphp">
      @php the_post_thumbnail() @endphp
    </a>
  @if($event->details)
    <div class="ui middle aligned content">
      <a class="header" href="@php echo get_the_permalink(); @endphp">@php echo get_the_title() @endphp</a>
      <div class="meta">
        <span class="date">@php echo $event->date @endphp</span>
      </div>
        @php echo $event->details @endphp
    </div>
  @endif
</div>
